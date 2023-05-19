=== pluginMouezBouhani ===
Contributors: Bouhani mouez
Tags: plugin, formulaire, messages, e-mail
Requires at least: 5.0
Tested up to: 5.8
Stable tag: 1.0.0
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Le Plugin pluginMouezBouhani est une extension puissante pour WordPress qui vous permet d'ajouter facilement un formulaire personnalisé à votre site.
Le formulaire comporte deux champs : "Titre" et "Texte". Lorsque le formulaire est soumis, un nouveau message est créé avec les données saisies, et un e-mail est envoyé à l'administrateur du site.

== Installation ==

1. Téléchargez le fichier zip du plugin à partir de [https://github.com/moez-bouhani/pluginSendMessage].
2. Décompressez le fichier zip.
3. Téléversez le dossier `pluginMouezBouhani` dans le répertoire `/wp-content/plugins/`.
4. Activez le plugin via le menu "Extensions" dans WordPress.

== Utilisation ==

Utilisez le shortcode suivant pour afficher le formulaire sur une page ou un article.
Le formulaire affiche les champs "Titre" et "Texte". Une fois que l'utilisateur a rempli les champs et soumis le formulaire, les actions suivantes sont effectuées.


Le formulaire affiche les champs "Titre" et "Texte". Une fois que l'utilisateur a rempli les champs et soumis le formulaire, les actions suivantes sont effectuées :

1. Validation côté serveur : Le plugin vérifie si un article avec le même titre existe déjà. Si c'est le cas, un message d'erreur est affiché sans redirection.
2. Création d'un message non publié : Si le titre est unique, le plugin crée un nouveau message non publié avec le titre et le texte fournis.
3. Notification par e-mail : Le plugin envoie un e-mail à l'adresse e-mail de l'administrateur, contenant le titre et le texte du message.

== Configuration ==

Aucune configuration supplémentaire n'est requise. Le plugin fonctionne avec les paramètres par défaut de WordPress.

== Support ==

Si vous rencontrez des problèmes ou si vous avez des questions, n'hésitez pas à contacter  [mouez.bouhani@gmail.com].

== Contributions ==

Les contributions sont les bienvenues ! Si vous souhaitez contribuer à l'amélioration du plugin, veuillez soumettre une demande de pull sur notre dépôt GitHub à [https://github.com/moez-bouhani/pluginSendMessage].

== Licence ==

Ce plugin est distribué sous la licence GPL v2 ou ultérieure. Veuillez consulter le fichier LICENSE pour plus d'informations.

