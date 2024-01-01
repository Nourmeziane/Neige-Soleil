### Installation de Git
#### Windows
1. **Télécharger Git**: Visitez le site [Git for Windows](https://gitforwindows.org/) et téléchargez le dernier installateur.
2. **Installer Git**: Exécutez le fichier téléchargé et suivez les instructions d'installation. Laissez les options par défaut sauf si vous avez des préférences spécifiques.
3. **Vérifier l'Installation**: Ouvrez le terminal (Git Bash de préférence, installé avec Git) et tapez `git --version` pour vérifier que Git est installé correctement.

#### macOS
1. **Utiliser Homebrew**: Si Homebrew est installé, ouvrez le terminal et tapez `brew install git`.
2. **Sans Homebrew**: Vous pouvez télécharger l'installateur sur le [site officiel de Git](https://git-scm.com/download/mac).
3. **Vérifier l'Installation**: Dans le terminal, tapez `git --version`.

#### Linux
1. **Installation via Terminal**: Selon votre distribution, utilisez l'une des commandes suivantes :
   - Debian/Ubuntu: `sudo apt-get install git`
   - Fedora: `sudo dnf install git`
   - Arch: `sudo pacman -S git`
2. **Vérifier l'Installation**: Tapez `git --version` dans le terminal.

### Clonage du Répertoire GitHub
1. **Ouvrir le Terminal**: Ouvrez votre terminal ou Git Bash (Windows).
2. **Cloner le Répertoire**: Tapez `git clone https://github.com/wiziki-75/airfrance.git`. Cela va créer un dossier `airfrance` avec le contenu du répertoire.
3. **Entrer dans le Dossier**: Naviguez dans le dossier cloné en tapant `cd airfrance`.

### Configuration Initiale de Git
1. **Configuration de l'Utilisateur**: Configurez votre nom d'utilisateur et adresse email pour Git :
   - `git config --global user.name "Votre Nom"`
   - `git config --global user.email "votreemail@example.com"`
2. **Vérifier la Configuration**: Tapez `git config --list` pour voir les configurations.

### Commencer à Travailler
- **Vérifier l'État**: Utilisez `git status` pour voir l'état des fichiers.
- **Créer des Branches, Commits, etc.**: Vous pouvez maintenant commencer à travailler sur le projet, créer des branches, faire des commits, et finalement pousser vos modifications sur GitHub.

### Faire un Commit
1. **Vérifier l'État des Fichiers**: Tapez `git status` pour voir quels fichiers ont été modifiés ou ajoutés.
2. **Ajouter des Fichiers à Committer**: Utilisez `git add [nom_du_fichier]` pour chaque fichier que vous voulez inclure dans le commit. Si vous voulez ajouter tous les fichiers modifiés, utilisez `git add .`.
3. **Commit des Changements**: Tapez `git commit -m "Votre message de commit"`. Le message doit être descriptif et expliquer brièvement les modifications apportées.
4. **Pousser le Commit sur GitHub**: Utilisez `git push origin [nom_de_la_branche]` pour envoyer votre commit sur la branche spécifiée dans votre fork sur GitHub.

### Créer une Pull Request
1. **Aller sur GitHub**: Ouvrez un navigateur et allez sur le répertoire GitHub où vous avez forké et poussé vos changements (votre propre fork).
2. **Sélectionner la Branche**: Sur GitHub, dans votre fork, sélectionnez la branche où vous avez poussé vos changements.
3. **Initier la Pull Request**: Cliquez sur le bouton "New pull request" ou "Compare & pull request" à côté de votre branche.
4. **Configurer la Pull Request**:
   - **Base Repository**: Sélectionnez le répertoire original (pas votre fork) que vous voulez cibler avec votre pull request.
   - **Base Branch**: Sélectionnez la branche du répertoire original sur laquelle vous voulez que vos changements soient fusionnés.
   - **Head Repository**: Sélectionnez votre fork.
   - **Compare Branch**: Sélectionnez la branche contenant vos changements.
5. **Rédiger la Pull Request**: 
   - **Titre**: Donnez un titre clair et descriptif.
   - **Description**: Rédigez une description détaillée des changements que vous proposez.
6. **Soumettre la Pull Request**: Cliquez sur "Create pull request".

### Après la Création de la Pull Request
- **Réviser et Discuter**: Les contributeurs du projet original peuvent réviser votre pull request, proposer des modifications ou des discussions.
- **Mises à Jour**: Si des modifications supplémentaires sont nécessaires, effectuez-les dans votre branche locale et poussez-les; la pull request sera automatiquement mise à jour.
- **Fusion**: Si vos changements sont approuvés, un mainteneur du projet peut fusionner votre pull request avec la branche principale du projet.

En suivant ces étapes, vous pouvez efficacement contribuer à un projet sur GitHub en utilisant des commits et des pull requests.
