pipeline {
    agent any
    stages {
        stage('Retrieve Commit Hash') {
            steps {
                script {
                    COMMIT_HASH = bat(script: 'git rev-parse --short HEAD', returnStdout: true).trim()
                }
            }
        }

        stage('Deploy App on k8s') {
            steps {
                withCredentials([
                    string(credentialsId: 'my_kubernetes', variable: 'api_token')
                ]) {
                    script {
                        def appImage = "wissamrh/wissamrh:${COMMIT_HASH}"
                        def dbImage = "wissamrh/mysql:${COMMIT_HASH}"

                        // Use PowerShell commands within the bat step
                        bat """
                            Get-Content deploy.yaml | ForEach-Object { \$_ -replace 'wissamrh/wissamrh:latest', '$appImage' -replace 'wissamrh/mysql:latest', '$dbImage' } | Set-Content temp-deploy.yaml
                            kubectl --token $api_token --server http://127.0.0.1:8001 --insecure-skip-tls-verify=true apply -f temp-deploy.yaml
                        """
                    }
                }
            }
        }
    }
}
