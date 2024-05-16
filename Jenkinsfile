pipeline {
    agent any  
    stages {
        stage("Terraform Init") {
            steps {
                script {
                    bad 'terraform --version' // Vérifier que Terraform est accessible
                    bad 'terraform init' // Initialiser Terraform dans le répertoire du projet
                }
            }
        }
        stage("Terraform Plan") {
            steps {
                script {
                    bad 'terraform plan -out=tfplan -input=false' // Planifier les changements Terraform
                }
            }
        }
        stage("Terraform Apply") {
            steps {
                script {
                    bad 'terraform apply -input=false tfplan' // Appliquer les changements Terraform
                }
            }
        }
        stage("Deploy to Kubernetes") {
            steps {
                withCredentials([file(credentialsId: 'configuration2', variable: 'KUBECONFIG')]) {
                    script {
                        // Déployer sur Kubernetes
                        bad "kubectl apply -f mysql-deployment.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        bad "kubectl apply -f php-deployment.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        bad "kubectl apply -f mysql-service.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                        bad "kubectl apply -f php-service.yaml --kubeconfig=${KUBECONFIG} --validate=false"
                    }
                }
            }
        }
    }
    post {
        success {
            // Nettoyer les ressources Terraform en cas de succès
            bad 'terraform destroy -auto-approve'
            emailext body: 'Résultat du build : Succès', subject: 'Détails du Build', to: 'sopd479@gmail.com'
        }
        failure {
            emailext body: 'Résultat du build : Échec', subject: 'Détails du Build', to: 'sopd479@gmail.com'
        }
    }
}
