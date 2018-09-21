#!/bin/sh
ftp -n </home/pi/work/file.txt
rm -f /homepi/ftp/dengon99.csv
tail -n 100 /home/pi/work/dengon00.csv > /home/pi/ftp/dengon99.csv
