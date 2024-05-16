pipeline {
    agent any  
    stages {
        stage("Terraform Init") {
            steps {
                script {
                    dir('Terraform'){
                        bat 'terraform --version' // Vérifier que Terraform est accessible
                        bat 'terraform init' // Initialiser Terraform dans le répertoire du projet
                    }
                }
            }
        }
        stage("Terraform Plan") {
            steps {
                script {
                    bat 'terraform plan -out=tfplan -input=false' // Planifier les changements Terraform
                }
            }
        }
        stage("Terraform Apply") {
            steps {
                script {
                    bat 'terraform apply -input=false tfplan' // Appliquer les changements Terraform
                }
            }
        }
    post {
        success {
            // Nettoyer les ressources Terraform en cas de succès
            bat 'terraform destroy -auto-approve'
            emailext body: 'Résultat du build : Succès', subject: 'Détails du Build', to: 'sopd479@gmail.com'
        }
        failure {
            emailext body: 'Résultat du build : Échec', subject: 'Détails du Build', to: 'sopd479@gmail.com'
        }
    }
}
