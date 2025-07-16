# 🎥 YouTube Video Gallery

A lightweight WordPress plugin to create and manage a custom YouTube video gallery using a shortcode.

![YouTube Video Gallery](https://img.shields.io/badge/WordPress-Compatible-blue)
![Version](https://img.shields.io/badge/version-1.0.0-brightgreen)
![License](https://img.shields.io/badge/license-GPL--2.0-blue)

---

## ✨ Features

- ✅ Registers a custom post type called `Video`
- ✅ Adds a metabox for YouTube video ID and optional description
- ✅ Embeds videos automatically using YouTube's iframe
- ✅ Displays videos in a list using the `[videos]` shortcode
- ✅ Supports filtering by WordPress categories
- ✅ Clean and responsive output (CSS-ready)

---

## 🚀 Installation

1. Clone or download this repository.
2. Copy the folder into your WordPress plugins directory:
/wp-content/plugins/youtube-video-gallery/

markdown
Copiar
Editar
3. Activate the plugin from the WordPress Admin → Plugins.
4. Go to **Videos → Add New** to start adding your videos.

---

## 🛠️ Usage

### Step 1: Add a New Video

- Go to **Videos → Add New**.
- Enter a **title** for the video.
- In the **Video Fields** metabox:
- Paste the **YouTube video ID** (e.g., `dQw4w9WgXcQ`)
- Optionally enter **details or a description**
- Publish the video.

### Step 2: Display the Gallery

Use the shortcode anywhere in your site (page, post, widget, etc):

```shortcode
[videos]
🔧 Shortcode Attributes
Attribute	Default	Description
title	Videos Gallery	(Currently unused placeholder)
count	5	Number of videos to display
orderby	date	Order by: date, title, etc
order	DESC	Sort direction: ASC or DESC
category	all	Filter by WordPress category slug

Example:
sh
Copiar
Editar
[videos count="6" orderby="title" order="ASC" category="tutorials"]
📸 Screenshots
<details> <summary>1. Admin screen: Custom Post Type + Metabox</summary> <img src="assets/screenshot-1.jpg" alt="Admin Metabox"> </details> <details> <summary>2. Frontend: Embedded YouTube Videos via Shortcode</summary> <img src="assets/screenshot-2.jpg" alt="Video List Output"> </details>
❓ FAQ
Can I enter the full YouTube URL?
No — you must enter only the video ID.
For example, if the URL is:
https://www.youtube.com/watch?v=dQw4w9WgXcQ
You should enter:

nginx
Copiar
Editar
dQw4w9WgXcQ
Can I style the gallery?
Yes. The output uses wrapper classes:

.lista-videos for the full list

.gvy_video for each video item
You can style them via your theme or custom CSS.

📄 License
Licensed under the GPLv2 or later.

📦 Changelog
v1.0.0 – Initial Release
Custom Post Type: video

Metabox with YouTube ID and description

Shortcode [videos] with filtering and ordering options

🙌 Contributing
Pull requests are welcome! Feel free to open issues or suggest improvements.

📧 Contact
If you have questions or need support, open an issue on this repository.
