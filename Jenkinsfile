pipeline {
    agent any  
    stages {
        stage("test") {
            steps {
                echo "hello world"
            }
        }
        stage("build") {
            steps {
                script {
                    bat 'docker --version'
                    //bat "docker-compose up -d --build"
                }
            }
        }
        stage("deploy to Kubernetes") {
            steps {
                withCredentials([file(credentialsId: 'configuration2', variable: 'KUBECONFIG')]) {
                    script {
                        // Déployer sur Kubernetes
                        bat "kubectl apply -f mysql-deployment.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        bat "kubectl apply -f php-deployment.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        bat "kubectl apply -f mysql-service.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        bat "kubectl apply -f php-service.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                    }
                }
            }
        }
    }
    post {
        success {
            // Nettoyer les ressources Docker
            sh 'docker-compose down -v'
            emailext body: 'Resultat du build: Success', subject: 'Detail du Build', to: 'sopd479@gmail.com'

        }
        failure {
            emailext body: 'Resultat du build: Echec', subject: 'Detail du Build', to: 'sopd479@gmail.com'
        }
    }
}
