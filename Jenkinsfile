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
<<<<<<< HEAD
                    bat 'docker --version'
                    //bat "docker-compose up -d --build"
=======
                    bat 'docker --version' // Vérifier que Docker est accessible
                    // Lancement de Docker Compose
                    bat 'docker-compose up -d --build'
>>>>>>> 31e817aa35314eefcd714219d52f7e17086d166e
                }
            }
        }
        stage("deploy to Kubernetes") {
            steps {
<<<<<<< HEAD
                withCredentials([file(credentialsId: 'configuration2', variable: 'KUBECONFIG')]) {
                    script {
                        // Déployer sur Kubernetes
                        bat "kubectl apply -f mysql-deployment.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        bat "kubectl apply -f php-deployment.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        bat "kubectl apply -f mysql-service.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        bat "kubectl apply -f php-service.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                    }
=======
                script {
                    // Mettez ici vos commandes pour exécuter des tests
                    echo "Running tests"
                    bat 'curl -s http://localhost:8000'
                }
            }
        }
        stage('Test Deploy') {
            steps {
                script {
                    // Mettez ici vos commandes pour déployer l'application
                    echo "Deploy"
>>>>>>> 31e817aa35314eefcd714219d52f7e17086d166e
                }
            }
        }
    }
    post {
        success {
            // Nettoyer les ressources Docker
            bat 'docker-compose down -v'
            emailext body: 'Resultat du build: Success', subject: 'Detail du Build', to: 'sopd479@gmail.com'

        }
        failure {
            emailext body: 'Resultat du build: Echec', subject: 'Detail du Build', to: 'sopd479@gmail.com'
        }
    }
}
