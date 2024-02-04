pipeline {
    agent any

    stages {
        stage('Deploy App on k8s') {
            steps {
                script {
                    // Retrieve commit hash from the deployed image tag using PowerShell
                    def commitHash = bat(script: 'kubectl get deployment wissamrh-web-deployment -o jsonpath="{.spec.template.spec.containers[0].image}" | find /I ":"', returnStatus: true).trim()

                    // Extract the commit hash using string manipulation
                    commitHash = commitHash.substring(commitHash.lastIndexOf(":") + 1)

                    // Deploy the Kubernetes resources
                    withCredentials([
                        string(credentialsId: 'my_kubernetes', variable: 'api_token')
                    ]) {
                        bat 'kubectl --token %api_token% --server http://127.0.0.1:8001 --insecure-skip-tls-verify=true apply -f deploy.yaml'
                    }

                    // Pull Docker images using the commit hash
                    bat "docker pull wissamrh/wissamrh:${commitHash}"
                    bat "docker pull wissamrh/mysql:${commitHash}"
                }
            }
        }
    }
}
