<!DOCTYPE html>
<!-- saved from url=(0033)http://172.20.0.178/ssh_check.php -->
<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>

    </title>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>



    <style>
    #container {
        width: 100vw;
        height: 1000px;
        margin: 1em auto;
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 100vw;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 90%;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 10000;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
    </style>

    <!-- dataset -->
    <script>
    Highcharts.chart('container', {
        chart: {
            backgroundColor: 'white',
            style: {
                fontSize: '30px'
            },
            events: {
                load: function() {

                    // Draw the flow chart
                    const ren = this.renderer,
                        colors = Highcharts.getOptions().colors,
                        rightArrow = ['M', 0, 0, 'L', 100, 0, 'L', 90, 10, 'M', 100, 0, 'L', 90, -10],
                        leftArrow = ['M', 100, 0, 'L', 0, 0, 'L', 10, 10, 'M', 0, 0, 'L', 10, -10];

                    //VIP 1
                    ren.label('VIP', 20, 320)
                        .attr({
                            fill: '#FFC000',
                            height: 60,
                            width: 130
                        })
                        .css({
                            color: 'white'
                        })
                        .add()
                    ren.label('172.16.15.113', 25, 290)
                        .css({
                            color: colors[3],
                            fontSize: '20px'
                        })
                        .add();
                    // Web1
                    ren.label('Web #1', 300, 100)
                        .attr({
                            fill: '#5B9BD5',
                            height: 130,
                            width: 200
                        })
                        .css({
                            color: 'white'
                        })
                        .add()
                        .shadow(true);
                    ren.label('172.16.13.39', 300, 100)
                        .attr({
                            fill: '#002060',
                            height: 20,
                            width: 150
                        })
                        .css({
                            color: 'white',
                            fontSize: '20px'
                        })
                        .add()
                    // Web2
                    ren.label('Web #2', 300, 500)
                        .attr({
                            fill: '#5B9BD5',
                            height: 130,
                            width: 200,
                            opacity: 0.5
                        })
                        .css({
                            color: 'white'
                        })
                        .add()
                        .shadow(true);
                    ren.label('172.16.13.39', 300, 500)
                        .attr({
                            fill: '#002060',
                            height: 20,
                            width: 150
                        })
                        .css({
                            color: 'white',
                            fontSize: '20px'
                        })
                        .add()
                    // Arrow from VIP to Web
                    // ren.path(['M', 70, 257, 'L', 200, 80])
                    //     .attr({
                    //         'stroke-width': 4,
                    //         stroke: 'silver',
                    //     })
                    //     .translate(95, 95)
                    //     .add();
                    // ren.path(['M', 70, 257, 'L', 200, 480])
                    //     .attr({
                    //         'stroke-width': 4,
                    //         stroke: 'silver',
                    //         dashstyle: 'dash'
                    //     })
                    //     .translate(95, 95)
                    //     .add();
                    ren.path(['M', 157, 352, 'L', 300, 175])
                        .attr({
                            'stroke-width': 3,
                            stroke: 'red',
                        })
                        .add();

                    // ren.path(['M', 157, 352, 'L', 300, 575])
                    //     .attr({
                    //         'stroke-width': 3,
                    //         stroke: 'silver',
                    //         dashstyle: 'dash'
                    //     })
                    //     .add();
                    // Data 1
                    ren.label('DB #1', 865, 100)
                        .attr({
                            fill: '#5B9BD5',
                            height: 130,
                            width: 200
                        })
                        .css({
                            color: 'white'
                        })
                        .add()
                        .shadow(true);
                    ren.label('172.16.13.39', 865, 100)
                        .attr({
                            fill: '#002060',
                            height: 20,
                            width: 150
                        })
                        .css({
                            color: 'white',
                            fontSize: '20px'
                        })
                        .add()
                    // Data 2
                    ren.label('DB #2', 865, 500)
                        .attr({
                            fill: '#5B9BD5',
                            height: 130,
                            width: 200,
                            opacity: 0.5
                        })
                        .css({
                            color: 'white'
                        })
                        .add()
                        .shadow(true);
                    ren.label('172.16.13.39', 865, 500)
                        .attr({
                            fill: '#002060',
                            height: 20,
                            width: 150
                        })
                        .css({
                            color: 'white',
                            fontSize: '20px'
                        })
                        .add()
                    //VIP 2
                    ren.label('VIP', 650, 320)
                        .attr({
                            fill: '#FFC000',
                            height: 30,
                            width: 70,
                        })
                        .css({
                            color: 'white',
                            fontSize: '20px'
                        })
                        .add()
                    ren.label('172.16.15.113', 725, 325)
                        .css({
                            color: 'black',
                            fontSize: '20px'
                        })
                        .add();
                    /////////////////////////////
                    ren.path([
                            'M', 480, 235,
                            'L', 480, 340, 480, 340, 650, 340,

                        ])
                        .attr({
                            'stroke-width': 3,
                            stroke: '#C55A11'
                        })
                        .add();

                    // ren.path([
                    //         'M', 480, 500,
                    //         'L', 480, 340, 480, 340, 650, 340,

                    //     ])
                    //     .attr({
                    //         'stroke-width': 3,
                    //         stroke: '#C55A11',
                    //         dashstyle: 'dash'
                    //     })
                    //     .add();
                    ///////////////////////////
                    ren.path([
                            'M', 690, 320,
                            'L', 690, 170, 865, 170

                        ])
                        .attr({
                            'stroke-width': 3,
                            stroke: '#C55A11'
                        })
                        .add();
                    // ren.path([
                    //         'M', 690, 355,
                    //         'L', 690, 570, 865, 570

                    //     ])
                    //     .attr({
                    //         'stroke-width': 3,
                    //         stroke: '#C55A11',
                    //         dashstyle: 'dash'
                    //     })
                    //     .add();
                    ///////////////////////////

                    // FS#1
                    ren.label('FS #1', 1365, 100)
                        .attr({
                            fill: '#5B9BD5',
                            height: 130,
                            width: 200
                        })
                        .css({
                            color: 'white'
                        })
                        .add()
                        .shadow(true);
                    ren.label('172.16.13.39', 1365, 100)
                        .attr({
                            fill: '#002060',
                            height: 20,
                            width: 150
                        })
                        .css({
                            color: 'white',
                            fontSize: '20px'
                        })
                        .add()
                    // FS 2
                    ren.label('FS #2', 1365, 500)
                        .attr({
                            fill: '#5B9BD5',
                            height: 130,
                            width: 200,
                            opacity: 0.5
                        })
                        .css({
                            color: 'white'
                        })
                        .add()
                        .shadow(true);
                    ren.label('172.16.13.39', 1365, 500)
                        .attr({
                            fill: '#002060',
                            height: 20,
                            width: 150
                        })
                        .css({
                            color: 'white',
                            fontSize: '20px'
                        })
                        .add()
                    //VIP 2
                    ren.label('VIP', 1150, 370)
                        .attr({
                            fill: '#FFC000',
                            height: 30,
                            width: 70,
                        })
                        .css({
                            color: 'white',
                            fontSize: '20px'
                        })
                        .add()
                    ren.label('172.16.15.113', 1225, 375)
                        .css({
                            color: 'black',
                            fontSize: '20px'
                        })
                        .add();
                    /////////////////////////////
                    ren.path([
                            'M', 450, 235,
                            'L', 450, 390, 480, 390, 1150, 390,

                        ])
                        .attr({
                            'stroke-width': 3,
                            stroke: '#BF9000'
                        })
                        .add();

                    // ren.path([
                    //         'M', 450, 500,
                    //         'L', 450, 390, 480, 390, 1150, 390,

                    //     ])
                    //     .attr({
                    //         'stroke-width': 3,
                    //         stroke: '#BF9000',
                    //         dashstyle: 'dash'
                    //     })
                    //     .add();
                    ///////////////////////////
                    ren.path([
                            'M', 1190, 370,
                            'L', 1190, 175, 1365, 175

                        ])
                        .attr({
                            'stroke-width': 3,
                            stroke: '#BF9000'
                        })
                        .add();
                    // ren.path([
                    //         'M', 1190, 405,
                    //         'L', 1190, 570, 1365, 570

                    //     ])
                    //     .attr({
                    //         'stroke-width': 3,
                    //         stroke: '#BF9000',
                    //         dashstyle: 'dash'
                    //     })
                    //     .add();
                    ///////////////////////////
                }
            }
        },
        title: {
            text: 'Highcharts export server overview',
            style: {
                color: 'black',
                fontSize: '16px'
            },
            align: 'left'
        },
        accessibility: {
            typeDescription: 'Flowchart'
        }

    });
    </script>
</body><!-- custom styles -->

</html>