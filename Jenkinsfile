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
        stage("Deploy to Kubernetes") {
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
            // Nettoyer les ressources Terraform en cas de succès
            bat 'terraform destroy -auto-approve'
            emailext body: 'Résultat du build : Succès', subject: 'Détails du Build', to: 'sopd479@gmail.com'
        }
        failure {
            emailext body: 'Résultat du build : Échec', subject: 'Détails du Build', to: 'sopd479@gmail.com'
        }
    }
}
