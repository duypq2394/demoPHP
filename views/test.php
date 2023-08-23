<!DOCTYPE html>

<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>

    </title>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>
    <?php 
        $web1 = true;
        $web2 = false;
        $vip1 = '172.16.15.113';
        $db1 = true;
        $db2 = false;
        $vip2 = '172.16.15.118';
        $fs1 = true;
        $fs2 = false;
        $vip3 = '172.16.15.120';
        $output = [];
        // exec("sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh root@172.16.13.39 ip a", $output);
        exec('ip a',$output);
        $vip1 = getVipIp($output, '172.16.13.39');
        
        function getVipIp ($data, $ip) {
            $length = count($data);
            $i= 0;
            $ens = '';
            $vip = '';

            while($i < $length) {
                if($ens == '') {
                    if (str_contains($data[$i], $ip)) {
                        $ens = strstr($data[$i], 'ens');
                        $ens = "scope global secondary ".$ens;
                    }
                    }else {
                    if (str_contains($data[$i], $ens)) {
                        $vip = substr($data[$i], 0, strpos($data[$i], '/'));
                        $vip = str_replace('inet ', '', $vip) ;
                        return $vip;
                        break 1;
                    }
                }
                $i++;
            }
            return $vip;
        }
    ?>
    <script src="./ssh_check_files/highcharts.js"></script>
    <script src="./ssh_check_files/exporting.js"></script>
    <script src="./ssh_check_files/accessibility.js"></script>

    <figure class="highcharts-figure">
        <div id="container" data-highcharts-chart="0" aria-hidden="false" role="region"
            aria-label="Highcharts export server overview. Highcharts interactive chart." style="overflow: hidden;">
            <div id="highcharts-screen-reader-region-before-0" aria-hidden="false" style="position: relative;">
                <div aria-hidden="false"
                    style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                    <p>Highcharts export server overview</p>
                    <div>Flowchart</div>
                </div>
            </div>
            <div aria-hidden="false" class="highcharts-announcer-container" style="position: relative;">
                <div aria-hidden="false" aria-live="polite"
                    style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                </div>
                <div aria-hidden="false" aria-live="assertive"
                    style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                </div>
                <div aria-hidden="false" aria-live="polite"
                    style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                </div>
            </div>
            <div id="highcharts-lswxhsw-0" dir="ltr"
                style="position: relative; overflow: hidden; width: 2049px; height: 1000px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none; font-size: 30px;"
                class="highcharts-container " aria-hidden="false" tabindex="0">
                <div aria-hidden="false" class="highcharts-a11y-proxy-container-before"
                    style="top: 0px; left: 0px; white-space: nowrap; position: absolute;"></div><svg version="1.1"
                    class="highcharts-root" style="font-family: Helvetica, Arial, sans-serif; font-size: 30px;"
                    xmlns="http://www.w3.org/2000/svg" width="2049" height="1000" viewBox="0 0 2049 1000"
                    aria-hidden="false" aria-label="Interactive chart">
                    <desc aria-hidden="true">Created with Highcharts 11.1.0</desc>
                    <defs aria-hidden="true">
                        <filter id="highcharts-drop-shadow-0">
                            <fedropshadow dx="1" dy="1" flood-color="#000000" flood-opacity="0.75" stdDeviation="2.5">
                            </fedropshadow>
                        </filter>
                        <clippath id="highcharts-lswxhsw-1-">
                            <rect x="0" y="0" width="2029" height="942" fill="none"></rect>
                        </clippath>
                    </defs>
                    <rect fill="white" class="highcharts-background" filter="none" x="0" y="0" width="2049"
                        height="1000" rx="0" ry="0" aria-hidden="true"></rect>
                    <rect fill="none" class="highcharts-plot-background" x="10" y="43" width="2029" height="942"
                        filter="none" aria-hidden="true"></rect>
                    <g class="highcharts-label" transform="translate(20,320)" aria-hidden="true">
                        <rect fill="#FFC000" class="highcharts-label-box" x="0" y="0" width="136" height="66"></rect>
                        <text x="3" data-z-index="1" y="44" style="color: white; fill: white;">VIP</text>
                    </g>
                    <g class="highcharts-label" transform="translate(25,290)" aria-hidden="true"><text x="3"
                            data-z-index="1" y="21"
                            style="color: rgb(254, 106, 53); font-size: 20px; fill: rgb(254, 106, 53);">172.16.15.113</text>
                    </g>
                    <g class="highcharts-label" opacity="1" transform="translate(300,100)"
                        filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="0" width="206" height="136"></rect>
                        <text x="3" data-z-index="1" y="79" style="color: white; fill: white;">Web #1</text>
                    </g>
                    <g class="highcharts-label" transform="translate(300,100)" aria-hidden="true">
                        <rect fill="#002060" class="highcharts-label-box" x="0" y="0" width="156" height="26"></rect>
                        <text x="3" data-z-index="1" y="19.5"
                            style="color: white; font-size: 20px; fill: white;">172.16.13.39</text>
                    </g>
                    <g class="highcharts-label" opacity="0.5" transform="translate(300,500)"
                        filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="0" width="206" height="136"></rect>
                        <text x="3" data-z-index="1" y="79" style="color: white; fill: white;">Web #2</text>
                    </g>
                    <g class="highcharts-label" transform="translate(300,500)" aria-hidden="true">
                        <rect fill="#002060" class="highcharts-label-box" x="0" y="0" width="156" height="26"></rect>
                        <text x="3" data-z-index="1" y="19.5"
                            style="color: white; font-size: 20px; fill: white;">172.16.13.39</text>
                    </g>
                    <path fill="none" d="M 157 352 L 300 175" stroke-width="3" stroke="red" aria-hidden="true"></path>
                    <path fill="none" d="M 480 235 L 480 340 L 480 340 L 650 340" stroke-width="3" stroke="#C55A11"
                        aria-hidden="true"></path>
                    <path fill="none" d="M 450 235 L 450 390 L 480 390 L 1150 390" stroke-width="3" stroke="#BF9000"
                        aria-hidden="true"></path>
                    <g class="highcharts-label" opacity="1" transform="translate(865,100)"
                        filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="0" width="206" height="136"></rect>
                        <text x="3" data-z-index="1" y="79" style="color: white; fill: white;">DB #1</text>
                    </g>
                    <g class="highcharts-label" transform="translate(865,100)" aria-hidden="true">
                        <rect fill="#002060" class="highcharts-label-box" x="0" y="0" width="156" height="26"></rect>
                        <text x="3" data-z-index="1" y="19.5"
                            style="color: white; font-size: 20px; fill: white;">172.16.13.39</text>
                    </g>
                    <g class="highcharts-label" opacity="0.5" transform="translate(865,500)"
                        filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="0" width="206" height="136"></rect>
                        <text x="3" data-z-index="1" y="79" style="color: white; fill: white;">DB #2</text>
                    </g>
                    <g class="highcharts-label" transform="translate(865,500)" aria-hidden="true">
                        <rect fill="#002060" class="highcharts-label-box" x="0" y="0" width="156" height="26"></rect>
                        <text x="3" data-z-index="1" y="19.5"
                            style="color: white; font-size: 20px; fill: white;">172.16.13.39</text>
                    </g>
                    <g class="highcharts-label" transform="translate(650,320)" aria-hidden="true">
                        <rect fill="#FFC000" class="highcharts-label-box" x="0" y="0" width="76" height="36"></rect>
                        <text x="3" data-z-index="1" y="24.5"
                            style="color: white; font-size: 20px; fill: white;">VIP</text>
                    </g>
                    <g class="highcharts-label" transform="translate(725,325)" aria-hidden="true"><text x="3"
                            data-z-index="1" y="21"
                            style="color: black; font-size: 20px; fill: black;">172.16.15.118</text></g>
                    <path fill="none" d="M 690 320 L 690 170 L 865 170" stroke-width="3" stroke="#C55A11"
                        aria-hidden="true"></path>
                    <g class="highcharts-label" opacity="1" transform="translate(1365,100)"
                        filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="0" width="206" height="136"></rect>
                        <text x="3" data-z-index="1" y="79" style="color: white; fill: white;">FS #1</text>
                    </g>
                    <g class="highcharts-label" transform="translate(1365,100)" aria-hidden="true">
                        <rect fill="#002060" class="highcharts-label-box" x="0" y="0" width="156" height="26"></rect>
                        <text x="3" data-z-index="1" y="19.5"
                            style="color: white; font-size: 20px; fill: white;">172.16.13.39</text>
                    </g>
                    <g class="highcharts-label" opacity="0.5" transform="translate(1365,500)"
                        filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="0" width="206" height="136"></rect>
                        <text x="3" data-z-index="1" y="79" style="color: white; fill: white;">FS #2</text>
                    </g>
                    <g class="highcharts-label" transform="translate(1365,500)" aria-hidden="true">
                        <rect fill="#002060" class="highcharts-label-box" x="0" y="0" width="156" height="26"></rect>
                        <text x="3" data-z-index="1" y="19.5"
                            style="color: white; font-size: 20px; fill: white;">172.16.13.39</text>
                    </g>
                    <g class="highcharts-label" transform="translate(1150,370)" aria-hidden="true">
                        <rect fill="#FFC000" class="highcharts-label-box" x="0" y="0" width="76" height="36"></rect>
                        <text x="3" data-z-index="1" y="24.5"
                            style="color: white; font-size: 20px; fill: white;">VIP</text>
                    </g>
                    <g class="highcharts-label" transform="translate(1225,375)" aria-hidden="true"><text x="3"
                            data-z-index="1" y="21"
                            style="color: black; font-size: 20px; fill: black;">172.16.15.120</text></g>
                    <path fill="none" d="M 1190 370 L 1190 175 L 1365 175" stroke-width="3" stroke="#BF9000"
                        aria-hidden="true"></path>
                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" stroke="#cccccc" stroke-width="0"
                        x="10" y="43" width="2029" height="942" aria-hidden="true"></rect>
                    <g class="highcharts-series-group" data-z-index="3" filter="none" aria-hidden="true"></g>
                    <g class="highcharts-exporting-group" data-z-index="3" aria-hidden="true">
                        <g class="highcharts-no-tooltip highcharts-button highcharts-contextbutton"
                            stroke-linecap="round" style="cursor: pointer;" transform="translate(2011,10)">
                            <title>Chart context menu</title>
                            <rect fill="#ffffff" class="highcharts-button-box" x="0.5" y="0.5" width="28" height="28"
                                rx="2" ry="2" stroke="none" stroke-width="1"></rect>
                            <path fill="#666666" d="M 8 9.5 L 22 9.5 M 8 14.5 L 22 14.5 M 8 19.5 L 22 19.5"
                                class="highcharts-button-symbol" data-z-index="1" stroke="#666666" stroke-width="3">
                            </path><text x="0" data-z-index="1" y="22.5"
                                style="color: rgb(51, 51, 51); font-size: 0.8em; font-weight: normal; fill: rgb(51, 51, 51);"></text>
                        </g>
                    </g><text x="10" text-anchor="start" class="highcharts-title" data-z-index="4"
                        style="font-size: 16px; color: black; font-weight: bold; fill: black;" y="22"
                        aria-hidden="true">Highcharts export server overview</text><text x="1025" text-anchor="middle"
                        class="highcharts-subtitle" data-z-index="4"
                        style="color: rgb(102, 102, 102); font-size: 0.8em; fill: rgb(102, 102, 102);" y="53"
                        aria-hidden="true"></text><text x="10" text-anchor="start" class="highcharts-caption"
                        data-z-index="4" style="color: rgb(102, 102, 102); font-size: 0.8em; fill: rgb(102, 102, 102);"
                        y="1008" aria-hidden="true"></text>
                    <g class="highcharts-legend highcharts-no-tooltip" data-z-index="7" visibility="hidden"
                        aria-hidden="true">
                        <rect fill="none" class="highcharts-legend-box" rx="0" ry="0" stroke="#999999" stroke-width="0"
                            filter="none" x="0" y="0" width="8" height="8"></rect>
                        <g data-z-index="1">
                            <g></g>
                        </g>
                    </g><text x="2039" class="highcharts-credits" text-anchor="end" data-z-index="8" y="995"
                        style="cursor: pointer; color: rgb(153, 153, 153); font-size: 0.6em; fill: rgb(153, 153, 153);"
                        aria-label="Chart credits: Highcharts.com" aria-hidden="false">Highcharts.com</text>
                    <rect x="2009.5001220703125" y="8.5" rx="3" ry="3" width="32.00000190734863"
                        height="32.00000190734863" fill="none" class="highcharts-focus-border" data-z-index="99"
                        stroke="#334eff" stroke-width="2"></rect>
                </svg>
                <div aria-hidden="false" class="highcharts-a11y-proxy-container-after"
                    style="top: 0px; left: 0px; white-space: nowrap; position: absolute;">
                    <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-zoom"></div>
                    <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-chartMenu"><button
                            class="highcharts-a11y-proxy-button highcharts-no-tooltip"
                            aria-label="View chart menu, Highcharts export server overview" aria-expanded="false"
                            title="Chart context menu"
                            style="border-width: 0px; background-color: transparent; cursor: pointer; outline: none; opacity: 0.001; z-index: 999; overflow: hidden; padding: 0px; margin: 0px; display: block; position: absolute; width: 27.9996px; height: 28px; left: 2011px; top: 11px;"></button>
                    </div>
                </div>
            </div>
            <div id="highcharts-screen-reader-region-after-0" aria-hidden="false" style="position: relative;">
                <div aria-hidden="false"
                    style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                    <div id="highcharts-end-of-chart-marker-0" class="highcharts-exit-anchor" tabindex="0"
                        aria-hidden="false">End of interactive chart.</div>
                </div>
            </div>
        </div>
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
    <script type="text/javascript">
    var vip1 = <?php echo json_encode($vip1); ?>;
    var vip2 = <?php echo json_encode($vip2); ?>;
    var vip3 = <?php echo json_encode($vip3); ?>;
    var web1 = <?php echo json_encode($web1); ?>;
    var web2 = <?php echo json_encode($web2); ?>;
    var db1 = <?php echo json_encode($db1); ?>;
    var db2 = <?php echo json_encode($db2); ?>;
    var fs1 = <?php echo json_encode($fs1); ?>;
    var fs2 = <?php echo json_encode($fs2); ?>;

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
                    ren.label(vip1, 25, 290)
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
                            width: 200,
                            opacity: web1 ? 1 : 0.5
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
                            opacity: web2 ? 1 : 0.5
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
                    // Arrow from VIP1 to Web
                    if (vip1) {
                        if (web1) {
                            // Arrow from VIP1 to Web
                            ren.path(['M', 157, 352, 'L', 300, 175])
                                .attr({
                                    'stroke-width': 3,
                                    stroke: 'red',
                                })
                                .add();
                            // Arrow from web to vip2
                            if (vip2) {
                                ren.path([
                                        'M', 480, 235,
                                        'L', 480, 340, 480, 340, 650, 340,

                                    ])
                                    .attr({
                                        'stroke-width': 3,
                                        stroke: '#C55A11'
                                    })
                                    .add();
                            }

                            // Arrow from web to vip3
                            if (vip3) {
                                ren.path([
                                        'M', 450, 235,
                                        'L', 450, 390, 480, 390, 1150, 390,

                                    ])
                                    .attr({
                                        'stroke-width': 3,
                                        stroke: '#BF9000'
                                    })
                                    .add();
                            }
                        } else {
                            // Arrow from VIP1 to Web
                            ren.path(['M', 157, 352, 'L', 300, 575])
                                .attr({
                                    'stroke-width': 3,
                                    stroke: 'silver',
                                    dashstyle: 'dash'
                                })
                                .add();
                            // Arrow from web to vip2
                            if (vip2) {
                                ren.path([
                                        'M', 480, 500,
                                        'L', 480, 340, 480, 340, 650, 340,

                                    ])
                                    .attr({
                                        'stroke-width': 3,
                                        stroke: '#C55A11',
                                        dashstyle: 'dash'
                                    })
                                    .add();
                            }

                            // Arrow from web to vip3
                            if (vip3) {
                                ren.path([
                                        'M', 450, 500,
                                        'L', 450, 390, 480, 390, 1150, 390,

                                    ])
                                    .attr({
                                        'stroke-width': 3,
                                        stroke: '#BF9000',
                                        dashstyle: 'dash'
                                    })
                                    .add();
                            }
                        }
                    }

                    // Data 1
                    ren.label('DB #1', 865, 100)
                        .attr({
                            fill: '#5B9BD5',
                            height: 130,
                            width: 200,
                            opacity: db1 ? 1 : 0.5
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
                            opacity: db2 ? 1 : 0.5
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
                    ren.label(vip2, 725, 325)
                        .css({
                            color: 'black',
                            fontSize: '20px'
                        })
                        .add();
                    /////////////////////////////
                    if ((vip1) && (db1 || db2)) {
                        if (db1) {
                            ren.path([
                                    'M', 690, 320,
                                    'L', 690, 170, 865, 170

                                ])
                                .attr({
                                    'stroke-width': 3,
                                    stroke: '#C55A11'
                                })
                                .add();
                        } else {
                            ren.path([
                                    'M', 690, 355,
                                    'L', 690, 570, 865, 570

                                ])
                                .attr({
                                    'stroke-width': 3,
                                    stroke: '#C55A11',
                                    dashstyle: 'dash'
                                })
                                .add();
                        }
                    }


                    ///////////////////////////

                    // FS#1
                    ren.label('FS #1', 1365, 100)
                        .attr({
                            fill: '#5B9BD5',
                            height: 130,
                            width: 200,
                            opacity: fs1 ? 1 : 0.5
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
                            opacity: fs2 ? 1 : 0.5
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
                    ren.label(vip3, 1225, 375)
                        .css({
                            color: 'black',
                            fontSize: '20px'
                        })
                        .add();
                    /////////////////////////////
                    if ((web1 || web2) && (fs1 || fs2)) {
                        if (fs1) {
                            ren.path([
                                    'M', 1190, 370,
                                    'L', 1190, 175, 1365, 175

                                ])
                                .attr({
                                    'stroke-width': 3,
                                    stroke: '#BF9000'
                                })
                                .add();
                        } else {
                            ren.path([
                                    'M', 1190, 405,
                                    'L', 1190, 570, 1365, 570
                                ])
                                .attr({
                                    'stroke-width': 3,
                                    stroke: '#BF9000',
                                    dashstyle: 'dash'
                                })
                                .add();
                        }
                    }

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
