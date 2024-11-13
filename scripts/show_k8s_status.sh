#!/bin/bash
echo "Kubernetes Nodes:"
kubectl get nodes
echo -e "\nKubernetes Services:"
kubectl get svc
echo -e "\nKubernetes Pods:"
kubectl get pods
