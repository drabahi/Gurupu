# <span style='color:red'>Installation de Tower</span>

Groupe 1 - GURUPU

[TOC]

<b style='color:green'>Distribution</b>

Pour tout le monde.

<b style='color:green'>Confidentialité</b>

Non.

<b style='color:green'>Copies supplémentaires</b>

Des copies supplémentaires de ce document peuvent être offerte a tous.

<b style='color:green'>Révisions et versions du document</b>

Gurupu, 6/03/18, version 1



## 1. A propos de ce document

Ce document decrit les etapes d'installation et configuration de Ansible Tower pour le Workshop du 6 Mars 2018.

### 1.1 Audience

Ce document s'addresse a Riad

### 1.2 Sigles et Acronymes

| Acronyme | Description                |
| :------- | :------------------------- |
| NICs     | Network Interface Card     |
| NAT      | Network Adress Translation |

## 2. Configuration des serveurs

### 2.1 Hardware

Les serveurs ont la configuration suivante:

- Distribution: CentOS 7
- Nom: Tower, node1, node2, node3
- Mémoire: 8 Go
- Disques internes: sda: 8 Go

###  2.2 Système d'exploitation

Le serveur a été installé en CentOs 7 x86_64 avec une installation minimal.



### 2.3 Configuration du réseaux

| Serveur | IP addresse   | Système  | NICs                                               |
| ------- | ------------- | -------- | -------------------------------------------------- |
| Tower   | 192.168.56.10 | CentOS 7 | 1 nic: NAT<br />1 nic: configuré en hote seulement |
| node1   | 192.168.56.11 | CentOS 7 | 1 nic: NAT<br />1 nic: configuré en hote seulement |
| node2   | 192.168.56.12 | CentOS 7 | 1 nic: NAT<br />1 nic: configuré en hote seulement |
| node3   | 192.168.56.13 | CentOS 7 | 1 nic: NAT<br />1 nic: configuré en hote seulement |



#### 	2.3.1 Tower

```
# nmcli con mod "Connexion filaire 1" ipv4.adresses 1962.168.56.10
# nmcli con mod "Connexion filaire 1" ipv4.method manual
# nmcli con mod "Connexion filaire 1" connection.autoconnect yes
```



#### 	2.3.2 Node1

```
# nmcli con mod "Connexion filaire 1" ipv4.adresses 1962.168.56.11
# nmcli con mod "Connexion filaire 1" ipv4.method manual
# nmcli con mod "Connexion filaire 1" connection.autoconnect yes
```



#### 	2.3.3 Node2 

```
# nmcli con mod "Connexion filaire 1" ipv4.adresses 1962.168.56.12
# nmcli con mod "Connexion filaire 1" ipv4.method manual
# nmcli con mod "Connexion filaire 1" connection.autoconnect yes
```



#### 	2.3.4 Node3

```
# nmcli con mod "Connexion filaire 1" ipv4.adresses 1962.168.56.13
# nmcli con mod "Connexion filaire 1" ipv4.method manual
# nmcli con mod "Connexion filaire 1" connection.autoconnect yes
```





## 2.4 Configuration des machines

Les machines doivent appartenir au domaine: lab.com

#### 	2.3.1 Tower

``` # hostnamectl set-hostname tower.lab.com```

#### 	2.3.2 Node1

``` # hostnamectl set-hostname node1.lab.com```

#### 	2.3.3 Node2

``` # hostnamectl set-hostname node2.lab.com```

####	2.3.4 Node3

``` # hostnamectl set-hostname node3.lab.com```



## 3. Ansible Tower

### 3.1 Recupération d'Ansible Tower

Télécharger Ansible Tower a l'adresse suivante : https://www.ansible.com/products/tower

### 3.2 Recupération de la license

Une licence gratuit est disponible a l'adresse suivante: https://www.ansible.com/license

### 3.3 Installation de Ansible Tower



```
# tar -xf ansible-tower-setup-latest.tar.gz
# cd ansible-tower-setup-3.2.3
# vim inventory

	admin_password='root'
	pg_password='root'
	rabbitmq_password='root'

```



Dans un navigateur: https://192.168.56.10

La connexion n'étant pas securisé, il faut confirmer l'exception pour la securité.  
Par defaut les logs sont:

- Username: admin

- Password: root




## Documentation

http://docs.ansible.com/ansible/latest/tower.html