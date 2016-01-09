#!/bin/bash

#[1] Backup Table Registration
MYSQLHOST="127.0.0.1"
MYSQLDB="kapsulwaktu2015" #70foto
MYSQLUSER="root"
MYSQLPASS="BrynCahy0" #af1988

#File name with date only
DATE=$(date +%d-%m-%Y)

#File location
#FILE="/Library/WebServer/Documents/70foto/files/Registration_Data_$DATE.csv"
FILE="/home/kapsulwaktu2015/files/Registration_Data_$DATE.csv"

MYSQLOPTS="--user=${MYSQLUSER} --password=${MYSQLPASS} --host=${MYSQLHOST} ${MYSQLDB}"

#Testing purposes, give echo output
echo "Report Begin: $(date)"

mysql ${MYSQLOPTS} << EOFMYSQL
SELECT registration_name AS Nama, registration_address AS Alamat FROM tbl_registration INTO OUTFILE '$FILE' FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n';
EOFMYSQL

echo "Report End: $(date)"

#[2] Finally, Backup All ID & Photo Files
zip -r files/kapsulwaktu.zip /Library/WebServer/Documents/70foto/files
