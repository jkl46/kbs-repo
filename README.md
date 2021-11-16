# KBS windesheim 2021-2022

### Requirements

- Apache server hosting main folder
- MySql server hosting 'Nerdygadgets' Database set port and settings in .ENV

For database checkout: [NerdyGadgets](https://www.dropbox.com/s/8iet4y5qr616vxf/Nerdygadgets_database.sql?dl=0)

---

### Extra

**SQL login**
Change user and userpassword in .ENV

**Creating symlink to xamp htdocs**\
On windows: `mklink /D "{htdocs_folder_path}" "{kbs_repo}"`\
On linux: `sudo ln -s {kbs_repo_path} -t /opt/lampp/htdocs/`
