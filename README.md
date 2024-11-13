# Kubernetes Cluster Setup Guide

## Prerequisites
- Ensure `kubectl` is installed and configured.
- Make sure your Kubernetes cluster is up and running.

## Running Containers on Kubernetes

1. **Create Pods and Services**
   - Apply configurations from the `pods` folder:
     ```bash
     kubectl apply -f pods/
     ```

2. **View Cluster Status**
   - To check the status of nodes, services, and pods, use:
     ```bash
     ./show_k8s_status.sh
     ```

3. **Accessing Services**
   - Access services using the configured NodePorts. For example:
     - Grafana: `http://<Node-IP>:31301`
     - Prometheus: `http://<Node-IP>:31090`

## Resetting the Cluster
To completely reset your Kubernetes setup, follow the instructions in `reset_k8s.sh`.
