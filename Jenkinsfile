pipeline {
    agent any
    parameters {
        booleanParam(name: 'FORCE_DEPLOY', defaultValue: false, description: 'Force deployment even if there are no changes')
    }
    stages {
        stage('Deploy App on k8s') {
            steps {
                script {
                    if (params.FORCE_DEPLOY || isGitChange()) {
                        echo 'Triggering deployment...'
                        withCredentials([
                            string(credentialsId: 'my_kubernetes', variable: 'api_token')
                        ]) {
                            bat 'kubectl --token $api_token --server http://127.0.0.1:8001 --insecure-skip-tls-verify=true apply -f deploy.yaml --record'
                        }
                    } else {
                        echo 'No changes in the Git repository, skipping deployment.'
                    }
                }
            }
        }
    }
}

def isGitChange() {
    // Check if there are changes in the Git repository
    return bat(script: 'git diff --quiet HEAD', returnStatus: true) != 0
}
