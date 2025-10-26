<!--
          - #CONTACT
        -->

<article class="contact" data-page="gis">

    <header>
        <h2 class="h2 article-title">GIS</h2>
    </header>

    <section class="mapbox" data-mapbox>


        <div class="container mt-3">
            <h3 class="text-center mb-3">🗺️ GIS — رسم، آپلود KML/KMZ و تقاطع‌گیری (Robust)</h3>

            <div class="mb-3 text-center">
                <input type="file" id="kmlUpload" accept=".kml,.kmz,.xml" class="form-control w-50 mx-auto mb-2">
                <small class="text-muted">فایل KML یا KMZ خود را انتخاب کنید</small>
            </div>

            <div id="status" class="text-center mb-2"></div>
            <div id="map" style="height: 600px; border: 1px solid #ccc; border-radius: 10px;"></div>
        </div>

        <!-- ✅ نسخه صحیح togeojson برای مرورگر -->
        <script src="https://cdn.jsdelivr.net/npm/togeojson@0.16.0/dist/togeojson.js"></script>

        <!-- JSZip for KMZ -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>

        <!-- Turf -->
        <script src="https://unpkg.com/@turf/turf@6.5.0/dist/turf.min.js"></script>


        <!-- Dependencies -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>





        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const statusEl = id('status');
                const map = L.map('map').setView([35.6892, 51.3890], 11);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19}).addTo(map);

                const drawnItems = new L.FeatureGroup().addTo(map);
                let uploadedLayer = null;

                // draw control
                const drawControl = new L.Control.Draw({
                    draw: {
                        polygon: true,
                        rectangle: true,
                        circle: false,
                        polyline: false,
                        marker: false,
                        circlemarker: false
                    },
                    edit: {featureGroup: drawnItems}
                });
                map.addControl(drawControl);

                map.on(L.Draw.Event.CREATED, e => {
                    drawnItems.addLayer(e.layer);
                    setStatus('شکل کشیده شد — درحال محاسبه تقاطع...');
                    calculateIntersection();
                });

                // helper
                function id(i) {
                    return document.getElementById(i);
                }

                function setStatus(t) {
                    statusEl.innerText = t;
                    console.info('[GIS STATUS]', t);
                }

                // handle file input
                id('kmlUpload').addEventListener('change', async function (e) {
                    const file = e.target.files && e.target.files[0];
                    if (!file) return;
                    setStatus('درحال خواندن فایل...');
                    try {
                        const name = file.name.toLowerCase();

                        // KMZ -> unzip and find first .kml
                        let kmlText = null;
                        if (name.endsWith('.kmz')) {
                            setStatus('فایل KMZ است — درحال استخراج...');
                            const arrayBuffer = await file.arrayBuffer();
                            const zip = await JSZip.loadAsync(arrayBuffer);
                            // پیدا کردن اولین KML
                            let kmlFile = null;
                            zip.forEach((relativePath, zipEntry) => {
                                if (!kmlFile && relativePath.toLowerCase().endsWith('.kml')) kmlFile = zipEntry;
                            });
                            if (!kmlFile) throw new Error('داخل KMZ فایلی با پسوند .kml یافت نشد.');
                            kmlText = await kmlFile.async('text');
                        } else {
                            // KML/XML normal
                            kmlText = await file.text();
                        }

                        setStatus('درحال پارس XML...');
                        const parser = new DOMParser();
                        const xml = parser.parseFromString(kmlText, "application/xml");

                        // check for parseerror
                        if (xml.getElementsByTagName('parsererror').length) {
                            console.error('XML parse error', xml);
                            throw new Error('خطا در پارس XML فایل KML.');
                        }

                        // togeojson: library exposes window.togeojson or window.toGeoJSON depending on build
                        const tg = window.toGeoJSON || window.togeojson;
                        if (!tg || typeof tg.kml !== 'function') {
                            console.warn('toGeoJSON not found or invalid:', window.togeojson, window.toGeoJSON);
                            throw new Error('کتابخانهٔ togeojson لود نشده یا ناسازگار است.');
                        }

                        setStatus('تبدیل KML به GeoJSON...');
                        const geojson = tg.kml(xml);
                        if (!geojson || !geojson.features || geojson.features.length === 0) {
                            throw new Error('فایل KML شامل فیچر مکانی نیست یا قابل تبدیل نیست.');
                        }

                        // remove previous uploaded layer
                        if (uploadedLayer) map.removeLayer(uploadedLayer);
                        uploadedLayer = L.geoJSON(geojson, {
                            style: f => ({color: 'green', weight: 2}),
                            pointToLayer: (feature, latlng) => L.circleMarker(latlng, {radius: 6})
                        }).addTo(map);

                        try {
                            map.fitBounds(uploadedLayer.getBounds(), {maxZoom: 16});
                        } catch (e) {
                            console.warn('fitBounds fail', e);
                        }

                        setStatus('لایه آپلود شد — منتظر رسم کاربر/محاسبه تقاطع...');
                        calculateIntersection();
                    } catch (err) {
                        console.error('Upload/Parse error:', err);
                        alert('خطا: ' + (err.message || err));
                        setStatus('خطا: ' + (err.message || 'نامشخص'));
                    }
                });

                // intersection function that handles different geometry combos
                function calculateIntersection() {
                    if (!uploadedLayer || drawnItems.getLayers().length === 0) {
                        setStatus('برای محاسبه تقاطع، هم لایهٔ آپلود و هم شکل رسم‌شده نیاز است.');
                        return;
                    }
                    setStatus('درحال محاسبه تقاطع...');
                    // remove previous red layers
                    map.eachLayer(layer => {
                        if (layer.options && layer.options.color === 'red') map.removeLayer(layer);
                    });

                    const drawnGeo = drawnItems.toGeoJSON();
                    const uploadedGeo = uploadedLayer.toGeoJSON();

                    let intersectionsFound = 0;

                    drawnGeo.features.forEach(f1 => {
                        uploadedGeo.features.forEach(f2 => {
                            const t1 = (f1.geometry && f1.geometry.type) || '';
                            const t2 = (f2.geometry && f2.geometry.type) || '';

                            try {
                                // Polygon vs Polygon -> intersect
                                if (isPolygonish(t1) && isPolygonish(t2)) {
                                    const inter = turf.intersect(normalizeGeom(f1), normalizeGeom(f2));
                                    if (inter) {
                                        intersectionsFound++;
                                        L.geoJSON(inter, {color: 'red', fillOpacity: 0.5}).addTo(map);
                                    }
                                }
                                // Point in Polygon
                                else if (isPointish(t1) && isPolygonish(t2)) {
                                    const inside = turf.booleanPointInPolygon(f1, f2);
                                    if (inside) {
                                        intersectionsFound++;
                                        L.geoJSON(f1, {
                                            pointToLayer: () => L.circleMarker([f1.geometry.coordinates[1], f1.geometry.coordinates[0]], {
                                                color: 'red',
                                                radius: 6
                                            })
                                        }).addTo(map);
                                    }
                                } else if (isPolygonish(t1) && isPointish(t2)) {
                                    const inside = turf.booleanPointInPolygon(f2, f1);
                                    if (inside) {
                                        intersectionsFound++;
                                        L.geoJSON(f2, {
                                            pointToLayer: () => L.circleMarker([f2.geometry.coordinates[1], f2.geometry.coordinates[0]], {
                                                color: 'red',
                                                radius: 6
                                            })
                                        }).addTo(map);
                                    }
                                }
                                // Line vs Polygon -> lineIntersect
                                else if ((isLineish(t1) && isPolygonish(t2)) || (isPolygonish(t1) && isLineish(t2))) {
                                    const line = isLineish(t1) ? f1 : f2;
                                    const poly = isPolygonish(t1) ? f1 : f2;
                                    const li = turf.lineIntersect(line, poly);
                                    if (li && li.features && li.features.length) {
                                        intersectionsFound += li.features.length;
                                        L.geoJSON(li, {
                                            pointToLayer: (feat, latlng) => L.circleMarker(latlng, {
                                                color: 'red',
                                                radius: 5
                                            })
                                        }).addTo(map);
                                    }
                                }
                                // fallback: try turf.intersect but guard with try/catch
                                else {
                                    try {
                                        const inter = turf.intersect(normalizeGeom(f1), normalizeGeom(f2));
                                        if (inter) {
                                            intersectionsFound++;
                                            L.geoJSON(inter, {color: 'red', fillOpacity: 0.5}).addTo(map);
                                        }
                                    } catch (e) {
                                        console.warn('fallback intersect failed for types', t1, t2, e);
                                    }
                                }
                            } catch (e) {
                                console.error('intersect check error for features', e);
                            }
                        });
                    });

                    setStatus(intersectionsFound ? `تقاطع یافت شد: ${intersectionsFound} مورد` : 'هیچ تقاطعی یافت نشد.');
                }

                // geometry type helpers
                function isPolygonish(t) {
                    return /Polygon|MultiPolygon|GeometryCollection/i.test(t);
                }

                function isPointish(t) {
                    return /Point/i.test(t);
                }

                function isLineish(t) {
                    return /LineString|MultiLineString/i.test(t);
                }

                // normalize: sometimes KML polygons have coordinates in odd wrappers -> ensure valid Feature
                function normalizeGeom(feature) {
                    if (!feature) return feature;
                    // if GeometryCollection and has polygons, pick polygons? keep as-is for turf.intersect
                    return feature;
                }

            });
        </script>


    </section>
</article>
