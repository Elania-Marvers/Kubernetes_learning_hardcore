#!/bin/bash

echo "Resetting Kubernetes Cluster"

# Drain and delete all nodes except the control plane
kubectl get nodes | grep -v 'NAME' | awk '{print $1}' | xargs -I {} kubectl drain {} --ignore-daemonsets --delete-local-data
kubectl get nodes | grep -v 'NAME' | awk '{print $1}' | xargs -I {} kubectl delete node {}

# Reset kubeadm and related settings
sudo kubeadm reset -f
sudo rm -rf /etc/cni/net.d
sudo ip link delete cni0
sudo ip link delete flannel.1
sudo rm -rf ~/.kube

echo "Kubernetes cluster has been reset."
