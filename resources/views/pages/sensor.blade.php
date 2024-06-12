@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <!-- Gas Sensor Monitoring -->
        <div class="col-sm-12 col-md-6">
            <div class="card iq-mb-3">
                <div class="card-body">
                    <h4 class="card-title">Monitoring Sensor Gas</h4>
                    <p class="card-text">Grafik berikut adalah monitoring sensor gas 3 menit terakhir.</p>
                    <div id="monitoringGas"></div>
                    <p class="card-text"><small class="text-muted">Terakhir diubah 3 menit lalu</small></p>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-md-5">
            <div class="card iq-mb-3">
                <div class="card-body">
                    <h4 class="card-title">Monitoring Sensor Gas</h4>
                    <p class="card-text">Grafik berikut adalah monitoring sensor gas 3 menit terakhir.</p>
                    <div id="gaugeGas"></div>
                    <p class="card-text"><small class="text-muted">Terakhir diubah 3 menit lalu</small></p>
                </div>
            </div>
        </div>

        <!-- DHT11 Sensor Monitoring (Humidity) -->
        <div class="col-sm-10 col-md-4">
            <div class="card iq-mb-3">
                <div class="card-body">
                    <h4 class="card-title">Monitoring Kelembaban (DHT11)</h4>
                    <p class="card-text">Grafik berikut adalah monitoring kelembaban sensor DHT11 3 menit terakhir.</p>
                    <div id="gaugeHumidity"></div>
                    <p class="card-text"><small class="text-muted">Terakhir diubah 3 menit lalu</small></p>
                </div>
            </div>
        </div>

        <!-- DHT11 Sensor Monitoring (Temperature) -->
        <div class="col-sm-10 col-md-4">
            <div class="card iq-mb-3">
                <div class="card-body">
                    <h4 class="card-title">Monitoring Suhu (DHT11)</h4>
                    <p class="card-text">Grafik berikut adalah monitoring suhu sensor DHT11 3 menit terakhir.</p>
                    <div id="gaugeTemperature"></div>
                    <p class="card-text"><small class="text-muted">Terakhir diubah 3 menit lalu</small></p>
                </div>
            </div>
        </div>

        <!-- Rain sensor -->
        <div class="col-sm-10 col-md-4">
            <div class="card iq-mb-3">
                <div class="card-body">
                    <h4 class="card-title">Monitoring Sensor Hujan</h4>
                    <p class="card-text">Grafik berikut adalah monitoring sensor hujan 3 menit terakhir.</p>
                    <div id="gaugeRain"></div>
                    <p class="card-text"><small class="text-muted">Terakhir diubah 3 menit lalu</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        let chartGas, gaugeGas, gaugeHumidity, gaugeTemperature, gaugeRain;

        async function generateRandomData() {
            // Generate random data for chartGas
            const point = [new Date().getTime(), Math.floor(Math.random() * 100)];
            const series = chartGas.series[0],
                shift = series.data.length > 20;
            chartGas.series[0].addPoint(point, true, shift);

            // Generate random data for gaugeGas
            const gasValue = Math.floor(Math.random() * 1000);
            if (gaugeGas) {
                gaugeGas.series[0].points[0].update(gasValue);
            }

            // Generate random data for gaugeHumidity
            const humidityValue = Math.floor(Math.random() * 100);
            if (gaugeHumidity) {
                gaugeHumidity.series[0].points[0].update(humidityValue);
            }

            // Generate random data for gaugeTemperature
            const temperatureValue = Math.floor(Math.random() * 100);
            if (gaugeTemperature) {
                gaugeTemperature.series[0].points[0].update(temperatureValue);
            }

            // Generate random data for gaugeRain
            const rainValue = Math.floor(Math.random() * 100);
            if (gaugeRain) {
                gaugeRain.series[0].points[0].update(rainValue);
            }

            setTimeout(generateRandomData, 3000);
        }

        window.addEventListener('load', function() {
            chartGas = new Highcharts.Chart({
                chart: {
                    renderTo: 'monitoringGas',
                    defaultSeriesType: 'spline'
                },
                xAxis: {
                    type: 'datetime',
                    tickPixelInterval: 150,
                    maxZoom: 20 * 1000
                },
                yAxis: {
                    minPadding: 0.2,
                    maxPadding: 0.2,
                    title: {
                        text: 'Value',
                        margin: 80
                    }
                },
                series: [{
                    name: 'Gas',
                    data: []
                }]
            });

            function createGauge(container, min, max, bandsColor, suffix) {
                return new Highcharts.Chart({
                    chart: {
                        renderTo: container,
                        type: 'gauge',
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                        height: '80%'
                    },
                    title: {
                        text: ''
                    },
                    pane: {
                        startAngle: -90,
                        endAngle: 90,
                        background: null,
                        center: ['50%', '75%'],
                        size: '110%'
                    },
                    yAxis: {
                        min: min,
                        max: max,
                        lineWidth: 0,
                        tickPositions: [min, 250, 500, 750, max],
                        tickColor: 'black',
                        labels: {
                            enabled: true,
                            format: '{value}'
                        },
                        title: {
                            text: null
                        },
                        plotBands: bandsColor
                    },
                    series: [{
                        name: container,
                        data: [0],
                        dataLabels: {
                            enabled: true,
                            y: 20,
                            format: '{y}' + suffix,
                            style: {
                                fontSize: '25px',
                                color: 'black'
                            }
                        }
                    }]
                });
            }

            gaugeGas = createGauge('gaugeGas', 0, 1000, [{
                    from: 0,
                    to: 250,
                    color: '#4caf50', // Hijau
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 250,
                    to: 500,
                    color: '#ffee58', // Kuning
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 500,
                    to: 750,
                    color: '#ff9800', // Oren
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 750,
                    to: 1000,
                    color: '#f44336', // Merah
                    thickness: '5%' // Ketebalan 10%
                }],
                ' PPM'
            );

            gaugeHumidity = createGauge('gaugeHumidity', 0, 100, [{
                    from: 0,
                    to: 25,
                    color: '#4caf50', // Hijau
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 25,
                    to: 50,
                    color: '#ffee58', // Kuning
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 50,
                    to: 75,
                    color: '#ff9800', // Oren
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 75,
                    to: 100,
                    color: '#f44336', // Merah
                    thickness: '5%' // Ketebalan 10%
                }],
                '%'
            );

            gaugeTemperature = createGauge('gaugeTemperature', 0, 100, [{
                    from: 0,
                    to: 25,
                    color: '#4caf50', // Hijau
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 25,
                    to: 50,
                    color: '#ffee58', // Kuning
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 50,
                    to: 75,
                    color: '#ff9800', // Oren
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 75,
                    to: 100,
                    color: '#f44336', // Merah
                    thickness: '5%' // Ketebalan 10%
                }],
                '°C'
            );

            gaugeRain = createGauge('gaugeRain', 0, 100, [{
                    from: 0,
                    to: 25,
                    color: '#4caf50', // Hijau
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 25,
                    to: 50,
                    color: '#ffee58', // Kuning
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 50,
                    to: 75,
                    color: '#ff9800', // Oren
                    thickness: '5%' // Ketebalan 10%
                }, {
                    from: 75,
                    to: 100,
                    color: '#f44336', // Merah
                    thickness: '5%' // Ketebalan 10%
                }],
                'mm'
            );
            generateRandomData();
        });
    </script>
@endpush
