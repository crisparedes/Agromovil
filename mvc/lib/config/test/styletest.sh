# Prueba de estilo
phpcs --report=checkstyle --report-file=/var/lib/jenkins/jobs/SCI/workspace/checkstyleModel.xml --standard=PSR1 /var/lib/jenkins/jobs/SCI/workspace/mvc/model/
phpcs --report=checkstyle --report-file=/var/lib/jenkins/jobs/SCI/workspace/checkstyleView.xml --standard=PSR1 /var/lib/jenkins/jobs/SCI/workspace/mvc/view/
phpcs --report=checkstyle --report-file=/var/lib/jenkins/jobs/SCI/workspace/checkstyleController.xml --standard=PSR1 /var/lib/jenkins/jobs/SCI/workspace/mvc/controller/
#saca solo grandes rasgos
phpcs --standard=PSR1 --report=summary --report-file=/var/lib/jenkins/jobs/SCI/workspace/summaryModel.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/model/
phpcs --standard=PSR1 --report=summary --report-file=/var/lib/jenkins/jobs/SCI/workspace/summaryView.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/view/
phpcs --standard=PSR1 --report=summary --report-file=/var/lib/jenkins/jobs/SCI/workspace/summaryCtrl.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/controller/
#detalles de todo
phpcs --standard=PSR1 --report-file=/var/lib/jenkins/jobs/SCI/workspace/detailModel.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/model/
phpcs --standard=PSR1 --report-file=/var/lib/jenkins/jobs/SCI/workspace/detailView.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/view/
phpcs --standard=PSR1 --report-file=/var/lib/jenkins/jobs/SCI/workspace/detailCtrl.txt /var/lib/jenkins/jobs/SCI/workspace/mvc/controller/
