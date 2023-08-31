Apache(httpd)は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /etc/keepalived/chk_httpd.sh
商用環境版SocToolServer は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /etc/keepalived/chk_SokToolServer_Tougou.sh
商用環境 v4版ドキュメント管理API版SocToolServer は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /etc/keepalived/chk_SokToolServer_v4_Tougou.sh
商用環境 v4版ドキュメント管理API 発呼元10.79.32.220版SocToolServer は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /etc/keepalived/chk_SokToolServer_v410_Tougou.sh
商用環境 連携サーバ版SocToolServer は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /etc/keepalived/chk_SokToolServer_Syanai.sh
NFS(nfs-server)は、起動していること
sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@[固定IP①] /etc/keepalived/chk_nfs-server.sh
