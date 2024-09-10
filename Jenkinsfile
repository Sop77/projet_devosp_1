pipeline {
  agent any
  stages {
    stage ('test') {
      steps {
        bat 'docker ps -a'
      }
    }
    stage ('Run Docker Compose') {
      steps {
        bat 'docker-compose up  -d'
      }
    }
  }
  post {
    success {
      slackSend channel: '#projet_devOps', message: 'Code execute'
      emailext to: 'sopd479@gmail.com',
               subject: "Succès: Build ${env.JOB_NAME} - ${env.BUILD_NUMBER}",
               body: "Le build ${env.JOB_NAME} - ${env.BUILD_NUMBER} a réussi. Détails: ${env.BUILD_URL}"
    }
    failure {
      slackSend channel: '#projet_devOps', message: 'Code execute with error'
      emailext to: 'sopd479@gmail.com',
               subject: "Échec: Build ${env.JOB_NAME} - ${env.BUILD_NUMBER}",
               body: "Le build ${env.JOB_NAME} - ${env.BUILD_NUMBER} a échoué. Détails: ${env.BUILD_URL}"
    }
  }
}
