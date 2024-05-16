pipeline {
    agent any

    environment {
        KUBECONFIG = credentials('configuration2') // Spécifier l'emplacement du fichier KUBECONFIG
    }

    stages {
        stage('Terraform Init') {
            steps {
                script {
                    dir('Terraform') {
                        bat 'terraform --version' // Vérifier que Terraform est accessible
                        bat 'terraform init' // Initialiser Terraform dans le répertoire du projet
                    }
                }
            }
        }
        stage('Terraform Plan') {
            steps {
                script {
                    dir('Terraform') {
                        bat 'terraform plan -out=tfplan' // Planifier les modifications Terraform
                    }
                }
            }
        }
        stage('Terraform Apply') {
            steps {
                script {
                    dir('Terraform') {
                        bat 'terraform apply -auto-approve tfplan' // Appliquer les modifications Terraform
                    }
                }
            }
        }
    }

    post {
        success {
            echo 'Déploiement réussi!'
        }
        failure {
            echo 'Échec du déploiement.'
        }
    }
}
