pipeline {
    agent any
    environment {
        // Assurez-vous que ce chemin mène à votre kubeconfig local généré par Minikube
        KUBECONFIG = "C:\\Users\\HP\\.kube\\config"
        // Chemin où se trouvent vos fichiers Terraform dans votre projet
        TERRA_DIR = "C:\\xampp\\htdocs\\mon_projet_aws\\Terraform"
    }
    stages {
        stage('Terraform Operations') {
            steps {
                script {
                    // Affiche la version de Terraform pour le débogage
                    bat 'terraform --version'
                    
                    // Initialise Terraform
                    bat "cd %TERRA_DIR% && terraform init"
                    
                    // Exécute le plan Terraform
                    bat "cd %TERRA_DIR% && terraform plan"
                    
                    // Applique la configuration Terraform
                    bat "cd %TERRA_DIR% && terraform apply --auto-approve"
                }
            }
        }
    }
    post {
        always {
            script {
                // Nettoie l'environnement après l'exécution du pipeline
                bat "cd %TERRA_DIR% && terraform destroy --auto-approve"
            }
        }
        success {
            emailext (
                subject: "Notification de build de Jenkins avec Terraform - Succès",
                body: "Votre build de pipeline Jenkins Terraform a réussi avec succès.",
                to: "sopd479@gmail.com"
            )
        }
        failure {
            emailext (
                subject: "Notification de build de Jenkins avec Terraform - Échec",
                body: "Votre build de pipeline Jenkins a échoué.",
                to: "sopd479@gmail.com"
            )
        }
    }
}
