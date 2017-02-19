# Sincronizar DB
#phpunit sincronizaDB.php

# Tests
#cd test

# Mensaje
echo 'Hola, estos son los cambios:' >> msg.txt
echo '' >> msg.txt
git log -name-only -1 >> msg.txt
echo '' >> msg.txt
echo '# Pruebas Unitarias' >> msg.txt
date -u >> msg.txt
echo '...' >> msg.txt

# Pruebas Unitarias
#sh tests.sh
echo 'No implementado' >> PruebasUnitarias.txt

date -u >> msg.txt

echo '# Pruebas de estilo de codigo' >> msg.txt
date -u >> msg.txt
echo '...' >> msg.txt

# Pruebas PHPCS
# Prueba de estilo
#phpcs --report=checkstyle --report-file=/var/lib/jenkins/jobs/SCI/workspace/checkstyleModel.xml --standard=PSR1 /var/lib/jenkins/jobs/SCI/workspace/mvc/model/
#phpcs --report=checkstyle --report-file=/var/lib/jenkins/jobs/SCI/workspace/checkstyleView.xml --standard=PSR1 /var/lib/jenkins/jobs/SCI/workspace/mvc/view/
#phpcs --report=checkstyle --report-file=/var/lib/jenkins/jobs/SCI/workspace/checkstyleController.xml --standard=PSR1 /var/lib/jenkins/jobs/SCI/workspace/mvc/controller/
#saca solo grandes rasgos
#phpcs --standard=PSR1 --report=summary --report-file=/var/lib/jenkins/jobs/SCI/workspace/summaryModel.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/model/
#phpcs --standard=PSR1 --report=summary --report-file=/var/lib/jenkins/jobs/SCI/workspace/summaryView.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/view/
#phpcs --standard=PSR1 --report=summary --report-file=/var/lib/jenkins/jobs/SCI/workspace/summaryCtrl.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/controller/
#detalles de todo
#phpcs --standard=PSR1 --report-file=/var/lib/jenkins/jobs/SCI/workspace/detailModel.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/model/
#phpcs --standard=PSR1 --report-file=/var/lib/jenkins/jobs/SCI/workspace/detailView.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/view/
#phpcs --standard=PSR1 --report-file=/var/lib/jenkins/jobs/SCI/workspace/detailCtrl.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/controller/

date -u >> msg.txt

echo '' >> msg.txt;
echo 'Finalizado!' >> msg.txt
echo '' >> msg.txt;

echo 'Adjunto resultado de pruebas' >> msg.txt
echo 'Ver Detalle: http://fergo2910.koding.io:8080/job/SCI/' >> msg.txt

echo '' >> msg.txt
echo 'Saludos,' >> msg.txt
echo 'Tu amigo Jenkins' >> msg.txt

# Zip con el resultado de las pruebas
#rar a ReporteCI.rar PruebasUnitarias.txt /var/lib/jenkins/jobs/SCI/workspace/summaryModel.txt /var/lib/jenkins/jobs/SCI/workspace/detailModel.txt /var/lib/jenkins/jobs/SCI/workspace/summaryView.txt /var/lib/jenkins/jobs/SCI/workspace/detailView.txt /var/lib/jenkins/jobs/SCI/workspace/summaryCtrl.txt /var/lib/jenkins/jobs/SCI/workspace/detailCtrl.txt
rar a ReporteCI.rar /var/lib/jenkins/jobs/SCI/builds/30/performance-reports/JMeter/resultLogIn.xml /var/lib/jenkins/jobs/SCI/builds/30/performance-reports/JMeter/resultProducts.xml

# Enviar mail a los Integrantes del proyecto
mpack -s "Cambios en el Proyecto Distribuidora" -d msg.txt ReporteCI.rar networker@christianagustin.com alekstay@gmail.com fergonzalez2910@gmail.com edward25nov@gmail.com cristiankris93@gmail.com
