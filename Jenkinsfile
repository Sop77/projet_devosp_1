pipeline {
    agent any

    environment {
        KUBECONFIG = credentials('configuration2') // Spécifier l'emplacement du fichier KUBECONFIG
    }

    stages {
        stage('Checkout') {
            steps {
                // Ajoutez ici les étapes pour récupérer le code depuis GitHub
                // Par exemple : git branch: 'votre_branche', credentialsId: 'votre_credentiel_git', url: 'URL_de_votre_projet_git'
            }
        }
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
