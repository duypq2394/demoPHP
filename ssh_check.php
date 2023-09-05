KeepAlivedは、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] systemctl is-active keepalived
Apache(httpd)は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /etc/keepalived/chk_httpd.sh
商用環境版SocToolServer は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /etc/keepalived/chk_SokToolServer_Tougou.sh
商用環境 v4版ドキュメント管理API版SocToolServer は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /etc/keepalived/chk_SokToolServer_v4_Tougou.sh
商用環境 v4版ドキュメント管理API 発呼元10.79.32.220版SocToolServer は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /etc/keepalived/chk_SokToolServer_v410_Tougou.sh
商用環境 連携サーバ版SocToolServer は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /bin/curl --connect-timeout 1 --output - 'http://[固定IP③]/'
Web2からチェック：10.79.32.111
Web1からチェック：10.79.32.112

NFS(nfs-server)は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /etc/keepalived/chk_nfs-server.sh

<g class="highcharts-label" opacity="<?php echo $web1 ? "1" : "0.5" ?>"
                        transform="translate(393,240)" filter="url(#highcharts-drop-shadow-0)" aria-hidden="true">
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="0" width="206" height="132"></rect>
                        <rect fill="red" class="highcharts-label-box" x="0" y="0" width="206" height="22"></rect>
                        <rect fill="red" class="highcharts-label-box" x="0" y="22" width="206" height="22"></rect>
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="44" width="206" height="22"></rect>
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="66" width="206" height="22"></rect>
                        <rect fill="red" class="highcharts-label-box" x="0" y="88" width="206" height="22"></rect>
                        <rect fill="#5B9BD5" class="highcharts-label-box" x="0" y="110" width="206" height="22"></rect>
                        <text x="3" data-z-index="1" y="15"
                            style="color: white; font-size: 15px; fill: white;">httpd</text>
                        <text x="3" data-z-index="1" y="37"
                            style="color: white; font-size: 15px; fill: white;">SocToolServer</text>
                        <text x="3" data-z-index="1" y="59"
                            style="color: white; font-size: 15px; fill: white;">SocToolServer_v4doc</text>
                        <text x="3" data-z-index="1" y="81"
                            style="color: white; font-size: 15px; fill: white;">SocToolServer _v4doc10</text>
                        <text x="3" data-z-index="1" y="103"
                            style="color: white; font-size: 15px; fill: white;">SocToolServer_Cooperation</text>
                        <text x="3" data-z-index="1" y="126"
                            style="color: white; font-size: 15px; fill: white;">nfs-server</text>
                    </g>
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP②] /etc/keepalived/chk_mariadb.sh
