













# <span style='color:red'>Installation de Satellite</span>

Groupe 1 - GURUPU

<div style="page-break-after: always;"></div>

[TOC]

<div style="page-break-after: always;"></div>

<b style='color:green'>Distribution</b>

Pour tout le monde.

<b style='color:green'>Confidentialité</b>

Non.

<b style='color:green'>Copies supplémentaires</b>

Des copies supplémentaires de ce document peuvent être offerte a tous.

<b style='color:green'>Révisions et versions du document</b>

Gurupu, 6/03/18, version 1

<div style="page-break-after: always;"></div>

## 1. A propos de ce document

Ce document decrit les etapes d'installation et configuration de Ansible Tower pour le Workshop du 9 Mars 2018.

### 1.1 Audience

Ce document s'addresse a Riad

### 1.2 Sigles et Acronymes

| Acronyme | Description                                    |
| :------- | :--------------------------------------------- |
| NICs     | Network Interface Card                         |
| NAT      | Network Adress Translation                     |
| ISO      | International Organization for Standardization |

## 2. Configuration des serveurs

### 2.1 Hardware

Les serveurs ont la configuration suivante:

- Distribution: Red Hat 7.4
- Mémoire: 16 Go
- Disques internes: sda: 30 Go

###  2.2 Système d'exploitation

Le serveur a été installé en Red Hat 7.4 x86_64 avec une installation minimal.

<div style="page-break-after: always;"></div>

## 3. Installation de Satellite

### 3.1 Systeme requis

The following requirements apply to the networked base system:

- 64-bit architecture
- The latest version of Red Hat Enterprise Linux 6 Server or 7 Server
- A minimum of 2 CPU cores, 4 CPU cores are recommended
- A minimum of 12 GB memory is required for the Satellite Server to function, 16 GB of memory or more is recommended for each instance of Satellite Server. In addition, a minimum of 4 GB of swap space is also recommended. Satellite running with less memory than the minimum value may not operate correctly.


- A unique host name, which can contain lower-case letters, numbers, dots (.) and hyphens (-)
- A current Red Hat Satellite subscription
- Administrative user (root) access
- A system umask of 0022
- Full forward and reverse DNS resolution using a fully-qualified domain name
- Attention la langue doit etre en anglais (en_US.UTF-8)
- The locale must be en_US.UTF-8

Before you install Satellite Server or Capsule Server, you should ensure that your environment meets
the requirements for installation.

### 3.2 Emplacement pour Satellite

Ajout d'un disque dur de 600 Go monter sur /var

/var doit etre monte sur du LVM pour etre extensible et formater en xfs pour eviter la limitation d'inode liée a ext4.

#### 3.2.1 Creation Lvm

``` 
pvcreate /dev/sdb
vgcreate vg /dev/sdb
lvcreate -l 100%FREE vg
mkfs.xfs /dev/vg/lvol0
```

#### 3.2.2 Montage 

Montage du disque sur /var dans /etc/fstab

<div style="page-break-after: always;"></div>

## 4. Installation Satellite 6

Montage de l'iso sur /mnt

```
cd /mnt
./install_packages
```

### 4.1 Ouverture des ports firewall

```
firewall-cmd --add-service=RH-Satellite-6 --permanent
firewall-cmd --reload
firewall-cmd --permanent --add-port={"53/udp", "53/tcp", "67/udp", "68/tcp", "69/udp}
firewall-cmd --reload
selinux --enforcing
```

### 4.2 Configuration initiale du serveur Satellite

```
satellite-installer --scenario satellite --foreman-admin-username admin --
foreman-admin-password redhat
```

#### 4.2.1 Interface Satellite

Se connecter a https://stallite.classroom.local

Dans *Content* - *Products*  ->  *Repo Discovery*  

Copier l'url http://mirror.centos.org/centos/7/os  ->  Discover

Dans les resultats selectionner le x86_64  ->  *Create selected*

​	Name: CentOs7

*Create*

<div style="page-break-after: always;"></div>

## 5. Ajout d'un client CentOs

### 5.1 Configuration de la machine 

#####		Sur node3 

```
yum -y install subscription-manager
yum -y localinstall http://stallite.classroom.local/pub/katello-ca-consumer-latest.noarch.rpm
subscription-manager register --org "Default_Orgnaization"
	login: admin
	password: redhat
yum -y install katello-agent
```

#####		Dans l'interface Satellite

*Hosts*  -> *Content Hosts*

*Subcriptions*  ->  *Subcriptions*  -> *Add*

Dans la liste des repos selectionner CentOs7

### Annexe

Attention Riad au nom du satellite !! stallite.classroom.local





