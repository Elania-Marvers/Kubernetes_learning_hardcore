#!/bin/bash

echo "Initializing Kubernetes control plane..."

# Initialize Kubernetes with a specific pod network CIDR (adjust as necessary)
sudo kubeadm init --pod-network-cidr=192.168.0.0/16 --apiserver-advertise-address=192.168.2.103

# Set up kubectl for the root user (if running as non-root, adjust accordingly)
echo "Setting up kubectl for the current user..."
mkdir -p $HOME/.kube
sudo cp -i /etc/kubernetes/admin.conf $HOME/.kube/config
sudo chown $(id -u):$(id -g) $HOME/.kube/config

# Install Calico as the networking plugin
echo "Applying Calico networking plugin..."
kubectl apply -f https://raw.githubusercontent.com/projectcalico/calico/v3.28.0/manifests/calico.yaml

echo "Kubernetes initialization complete. Run 'kubectl get nodes' to check the node status."
