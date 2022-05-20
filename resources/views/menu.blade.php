<nav class="menu">
		<a href="/" class="menu-item">
            <span class="material-icons-outlined">home</span>
			<span class="menu-item-label">Accueil</span>
		</a>
		<a href="/agenda" class="menu-item">
			<span class="material-icons-outlined">calendar_month</span>
			<span class="menu-item-label">Agenda</span>
		</a>
		<a href="/documents" class="menu-item">
			<span class="material-icons-outlined" id="docmenu">description</span>
			<span class="menu-item-label">Documents</span>
		</a>
		<a href="/newbudget" class="menu-item">
			<span class="material-icons-outlined">credit_card</span>
			<span class="menu-item-label">Budget</span>
		</a>
        <a href="/user/profile" class="menu-item">
            <span class="material-icons-outlined">person_outline</span>
			<span class="menu-item-label">Profil</span>
		</a>
</nav>

<style>
    *,
*:after,
*:before {
  box-sizing: border-box;
}

.menu {
  display: flex;
  flex-grow: 1;
  height: 52px;
  width: 100%;
  border-radius: 4px;
  overflow: hidden;
  background-color: #fff;
  box-shadow: 0 0 1px 0 rgba(52, 46, 173, 0.25), 0 15px 30px 0 rgba(52, 46, 173, 0.1);
  position: fixed;
  bottom: 0;
  z-index:1111;
}

.menu-item {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  flex-grow: 1;
  text-decoration: none;
}
.menu-item:focus, .menu-item:hover {
  outline: none;
}
.menu-item:focus .material-icons, .menu-item:hover .material-icons {
  color: #342ead;
}
.menu-item:focus .menu-item-label, .menu-item:hover .menu-item-label {
  color: #342ead;
}

.material-icons {
  display: block;
  margin-bottom: 4px;
  font-size: 26px;
  transition: 0.25s ease;
}

.material-icons-outlined {
  display: block;
  margin-bottom: 4px;
  font-size: 26px;
  transition: 0.25s ease;
  color: #7a7f83;
}

.material-icons-outlined.active {
  color: #fa983a;
}

.menu-item-label {
  display: block;
  font-size: 13px;
  color: #343a40;
  transition: 0.25s ease;
}
</style>