#!/bin/bash

echo "Updating package index and installing prerequisites..."
sudo apt-get update -y
sudo apt-get install -y apt-transport-https ca-certificates curl

# Add the Kubernetes signing key
echo "Adding Kubernetes signing key..."
curl -fsSL https://packages.cloud.google.com/apt/doc/apt-key.gpg | sudo apt-key add -

# Add the Kubernetes APT repository
echo "Adding Kubernetes APT repository..."
sudo bash -c 'cat <<EOF >/etc/apt/sources.list.d/kubernetes.list
deb https://apt.kubernetes.io/ kubernetes-xenial main
EOF'

# Install Kubernetes tools
echo "Installing kubelet, kubeadm, and kubectl..."
sudo apt-get update -y
sudo apt-get install -y kubelet kubeadm kubectl

# Prevent Kubernetes tools from being automatically updated
echo "Holding kubelet, kubeadm, and kubectl packages..."
sudo apt-mark hold kubelet kubeadm kubectl

echo "Installation complete. Run 'k8s_init.sh' to initialize Kubernetes."
