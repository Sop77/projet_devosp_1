pipeline {
    environment {
        webDockerImageName = "sopd/mon_php_img"
        bdDockerImageName = "sopd/mysql_img"
        webDockerImage = ""
        dbDockerImage = ""
        registryCredential = 'docker-credentiel'
        KUBECONFIG = "/home/sop/.kube/config"
        TERRA_DIR  = "/home/sop/ligne-rouge/terraform"
        ANSIBLE_DIR = "/home/sop/ligne-rouge/ansible"
    }
    agent any
    stages {
        stage('Checkout Source') {
            steps {
                git 'https://github.com/Sop77/projet_devosp_1.git'
            }
        }
        stage('Build Web Docker image') {
            steps {
                script {
                    webDockerImage = docker.build webDockerImageName, "-f web.Dockerfile ."
                }
            }
        }
        stage('Build DB Docker image') {
            steps {
                script {
                    dbDockerImage = docker.build dbDockerImageName, "-f Db.Dockerfile ."
                }
            }
        }
        stage('Pushing Images to Docker Registry') {
            steps {
                script {
                    docker.withRegistry('https://registry.hub.docker.com', registryCredential) {
                        webDockerImage.push('latest')
                        dbDockerImage.push('latest')
                    }
                }
            }
        }
        stage("Provision Kubernetes Cluster with Terraform") {
            steps {
                script {
                    sh """
                    cd ${TERRA_DIR}
                    terraform init
                    terraform plan
                    terraform apply --auto-approve
                    """
                }
            }
        }
        stage('Install Python dependencies and Deploy with Ansible') {
            steps {
                script {
                    sh """
                    sudo apt-get install -y python3-venv
                    cd ${ANSIBLE_DIR}
                    sudo python3 -m venv venv
                    . venv/bin/activate
                    pip install kubernetes ansible
                    ansible-playbook ${ANSIBLE_DIR}/playbook.yml
                    """
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
        succes {
            emailext (
                subject : "Notification de build de jenkins avec terraform-succes",
                body : "votre build de pipeline jenkins terraform passe avec succes",
                to : "sopd479@gmail.com"
            )
        }
        failure {
            emailext (
                subject : "Notification de build de jenkins avec terraform echec",
                body : "votre build de pipeline jenkins ne passe pas",
                to : "sopd479@gmail.com"
            )
        }
    }
}
