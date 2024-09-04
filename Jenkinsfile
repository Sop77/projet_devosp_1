pipeline {
    agent any

    environment {
        DOCKER_COMPOSE_FILE = 'docker-compose.yml'
    }

    stages {
        stage('Build Docker Images') {
            steps {
                script {
                    // Construire les images Docker définies dans le fichier docker-compose.yml
                    sh "docker-compose -f ${DOCKER_COMPOSE_FILE} build"
                }
            }
        }
        stage('Deploy Docker Containers') {
            steps {
                script {
                    // Démarrer les conteneurs Docker en arrière-plan
                    sh "docker-compose -f ${DOCKER_COMPOSE_FILE} up -d"
                }
            }
        }
    }
}
