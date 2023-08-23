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
       	$web1 = false;
        $web2 = false;
        $vip1 = '';
        $db1 = false;
        $db2 = false;
        $vip2 = '';
        $fs1 = false;
        $fs2 = false;
        $vip3 = '';
   
      	// vip1
        $vip1 = getVipIp('172.16.13.39', 'ip a');
        if($vip1) {
        	$web1 = true;
        	$web2 = false;
        } else {
        	$vip1 = getVipIp('172.16.15.144', "sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh root@172.16.15.144 ip a");
        	if($vip1) {
        		$web1 = false;
        		$web2 = true;
        	}
        }
        
        // vip2
        $vip2 = getVipIp('172.16.15.116', "sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh root@172.16.15.116 ip a");
        if($vip2) {
        	$db1 = true;
        	$db2 = false;
        } else {
        	$vip2 = getVipIp('172.16.15.117', "sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh root@172.16.15.117 ip a");
        	if($vip2) {
        		$db1 = false;
        		$db2 = true;
        	}
        }
        
        // vip3
        $vip3 = getVipIp('172.16.13.40', "sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh root@172.16.13.40 ip a");
        if($vip3) {
        	$fs1 = true;
        	$fs2 = false;
        } else {
        	$vip3 = getVipIp('172.16.15.124', "sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh root@172.16.15.124 ip a");
        	if($vip1) {
        		$fs1 = false;
        		$fs2 = true;
        	}
        }
        
        function getVipIp ($ip, $code) {
        	$data = [];
        	
        	exec($code, $data);
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
            <div id="highcharts-0nkie92-0" dir="ltr"
                style="position: relative; overflow: hidden; width: 2240px; height: 1000px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none; font-size: 30px;"
                class="highcharts-container " aria-hidden="false" tabindex="0">
                <div aria-hidden="false" class="highcharts-a11y-proxy-container-before"
                    style="top: 0px; left: 0px; white-space: nowrap; position: absolute;"></div><svg version="1.1"
                    class="highcharts-root" style="font-family: Helvetica, Arial, sans-serif; font-size: 30px;"
                    xmlns="http://www.w3.org/2000/svg" width="2240" height="1000" viewBox="0 0 2240 1000"
                    aria-hidden="false" aria-label="Interactive chart">

                    <defs aria-hidden="true">
                        <filter id="highcharts-drop-shadow-0">
                            <fedropshadow dx="1" dy="1" flood-color="#000000" flood-opacity="0.75" stdDeviation="2.5">
                            </fedropshadow>
                        </filter>
                        <clippath id="highcharts-0nkie92-1-">
                            <rect x="0" y="0" width="2220" height="941" fill="none"></rect>
                        </clippath>
                    </defs>
                    <rect fill="white" class="highcharts-background" filter="none" x="0" y="0" width="2240"
                        height="1000" rx="0" ry="0" aria-hidden="true"></rect>
                    <rect fill="none" class="highcharts-plot-background" x="10" y="44" width="2220" height="941"
                        filter="none" aria-hidden="true"></rect>
                    <g class="highcharts-label" transform="translate(20,320)" aria-hidden="true">
                        <rect fill="#FFC000" class="highcharts-label-box" x="0" y="0" width="136" height="66"></rect>
                        <text x="3" data-z-index="1" y="44" style="color: white; fill: white;">VIP</text>
                    </g>
                    <g class="highcharts-label" transform="translate(25,290)" aria-hidden="true"><text x="3"
                            data-z-index="1" y="21"
                            style="color: rgb(254, 106, 53); font-size: 20px; fill: rgb(254, 106, 53);"><?php echo $vip1 ?></text>
                    </g>
                    <g class="highcharts-label" opacity="<?php echo $web1 ? "1" : "0.5" ?>"
                        transform="translate(300,100)" filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="0" width="206" height="136"></rect>
                        <text x="3" data-z-index="1" y="79" style="color: white; fill: white;">Web #1</text>
                    </g>
                    <g class="highcharts-label" transform="translate(300,100)" aria-hidden="true">
                        <rect fill="#002060" class="highcharts-label-box" x="0" y="0" width="156" height="26"></rect>
                        <text x="3" data-z-index="1" y="19.5"
                            style="color: white; font-size: 20px; fill: white;">172.16.13.39</text>
                    </g>
                    <g class="highcharts-label" opacity="<?php echo $web2 ? "1" : "0.5" ?>"
                        transform="translate(300,500)" filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="0" width="206" height="136"></rect>
                        <text x="3" data-z-index="1" y="79" style="color: white; fill: white;">Web #2</text>
                    </g>
                    <g class="highcharts-label" transform="translate(300,500)" aria-hidden="true">
                        <rect fill="#002060" class="highcharts-label-box" x="0" y="0" width="156" height="26"></rect>
                        <text x="3" data-z-index="1" y="19.5"
                            style="color: white; font-size: 20px; fill: white;">172.16.13.39</text>
                    </g>
                    <?php if ($vip1) { ?>
                    <?php if ($web1) { ?>
                    <!-- Arrow from VIP1 to Web -->
                    <path fill="none" d="M 157 352 L 300 175" stroke-width="3" stroke="red" aria-hidden="true"></path>
                    <?php if ($vip2) { ?>
                    <!-- Arrow from web to vip2 -->
                    <path fill="none" d="M 480 235 L 480 340 L 480 340 L 650 340" stroke-width="3" stroke="#C55A11"
                        aria-hidden="true"></path>
                    <?php } ?>
                    <?php if ($vip3) { ?>
                    <!-- Arrow from web to vip3 -->
                    <path fill="none" d="M 450 235 L 450 390 L 480 390 L 1150 390" stroke-width="3" stroke="#BF9000"
                        aria-hidden="true"></path>
                    <?php } ?>
                    <?php } else { ?>
                    <!-- Arrow from VIP1 to Web -->
                    <path fill="none" d="M 157 352 L 300 575" stroke-width="3" stroke="red" aria-hidden="true"></path>
                    <?php if ($vip2) { ?>
                    <!-- Arrow from web to vip2 -->
                    <path fill="none" d="M 480 500 L 480 340 L 480 340 L 650 340" stroke-width="3" stroke="#C55A11"
                        aria-hidden="true"></path>
                    <?php } ?>
                    <?php if ($vip3) { ?>
                    <!-- Arrow from web to vip3 -->
                    <path fill="none" d="M 450 500 L 450 390 L 480 390 L 1150 390" stroke-width="3" stroke="#BF9000"
                        aria-hidden="true"></path>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    <g class="highcharts-label" opacity="<?php echo $db1 ? "1" : "0.5" ?>"
                        transform="translate(865,100)" filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="0" width="206" height="136"></rect>
                        <text x="3" data-z-index="1" y="79" style="color: white; fill: white;">DB #1</text>
                    </g>
                    <g class="highcharts-label" transform="translate(865,100)" aria-hidden="true">
                        <rect fill="#002060" class="highcharts-label-box" x="0" y="0" width="156" height="26"></rect>
                        <text x="3" data-z-index="1" y="19.5"
                            style="color: white; font-size: 20px; fill: white;">172.16.13.39</text>
                    </g>
                    <g class="highcharts-label" opacity="<?php echo $db2 ? "1" : "0.5" ?>"
                        transform="translate(865,500)" filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
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
                            style="color: black; font-size: 20px; fill: black;"><?php echo $vip2 ?></text></g>
                    <?php if ($vip1 && ($db1 || $db2)) { ?>
                    <?php if ($db1) { ?>
                    <path fill="none" d="M 690 320 L 690 170 L 865 170" stroke-width="3" stroke="#C55A11"
                        aria-hidden="true"></path>
                    <?php } else { ?>
                    <path fill="none" d="M 690 355 L 690 570 L 865 570" stroke-width="3" stroke="#C55A11"
                        aria-hidden="true"></path>
                    <?php } ?>
                    <?php } ?>
                    <g class="highcharts-label" opacity="<?php echo $fs1 ? "1" : "0.5" ?>"
                        transform="translate(1365,100)" filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="0" width="206" height="136"></rect>
                        <text x="3" data-z-index="1" y="79" style="color: white; fill: white;">FS #1</text>
                    </g>
                    <g class="highcharts-label" transform="translate(1365,100)" aria-hidden="true">
                        <rect fill="#002060" class="highcharts-label-box" x="0" y="0" width="156" height="26"></rect>
                        <text x="3" data-z-index="1" y="19.5"
                            style="color: white; font-size: 20px; fill: white;">172.16.13.39</text>
                    </g>
                    <g class="highcharts-label" opacity="<?php echo $fs2 ? "1" : "0.5" ?>"
                        transform="translate(1365,500)" filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
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
                            style="color: black; font-size: 20px; fill: black;"><?php echo $vip3 ?></text></g>
                    <?php if ($vip1 && ($fs1 || $fs2)) { ?>
                    <?php if ($fs1) { ?>
                    <path fill="none" d="M 1190 370 L 1190 175 L 1365 175" stroke-width="3" stroke="#BF9000"
                        aria-hidden="true"></path>
                    <?php } else { ?>
                    <path fill="none" d="M 1190 405 L 1190 570 L 1365 570" stroke-width="3" stroke="#BF9000"
                        aria-hidden="true"></path>
                    <?php } ?>
                    <?php } ?>
                    <rect fill="none" class="highcharts-plot-border" data-z-index="1" stroke="#cccccc" stroke-width="0"
                        x="10" y="44" width="2220" height="941" aria-hidden="true"></rect>
                    <g class="highcharts-series-group" data-z-index="3" filter="none" aria-hidden="true"></g>

                    <text x="10" text-anchor="start" class="highcharts-title" data-z-index="4"
                        style="font-size: 16px; color: black; font-weight: bold; fill: black;" y="22"
                        aria-hidden="true">Highcharts export server overview</text><text x="1120" text-anchor="middle"
                        class="highcharts-subtitle" data-z-index="4"
                        style="color: rgb(102, 102, 102); font-size: 0.8em; fill: rgb(102, 102, 102);" y="54"
                        aria-hidden="true"></text><text x="10" text-anchor="start" class="highcharts-caption"
                        data-z-index="4" style="color: rgb(102, 102, 102); font-size: 0.8em; fill: rgb(102, 102, 102);"
                        y="1008" aria-hidden="true"></text>
                </svg>

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
</body><!-- custom styles -->

</html>
