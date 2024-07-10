import "./App.css";
import ShortContainer from "./components/ShortContainer";

function App() {
  return (
    <div>
      <nav className="navbar">
        <div className="nav">
          <div className="logo-container">
            <img src="/logo192.png" className="logo" alt="" />
          </div>

          <div className="search-container">
            <input
              type="text"
              className="search"
              placeholder="Rechercher une vidéos"
            />
            <span></span>
            <button>
              <ion-icon name="search-outline"></ion-icon>
            </button>
          </div>

          <ul>
            <li>
              <ion-icon name="notifications-outline"></ion-icon>
            </li>
            <li>
              <img
                src="/user.png"
                alt=""
              />
            </li>
          </ul>
        </div>
      </nav>
      <main className="main">
        <aside>
          <ul className="user-nav">
            <li className="active">
              <ion-icon name="home-outline"></ion-icon>
              <span>Pour toi</span>
            </li>
            <li>
              <ion-icon name="planet-outline"></ion-icon>
              <span>Exploré</span>
            </li>
            <li>
              <ion-icon name="videocam-outline"></ion-icon>
              <span>Live</span>
            </li>
            <li>
              <ion-icon name="people-outline"></ion-icon>
              <span>Amis</span>
            </li>
          </ul>
          <ul className="nav-help">
            <li>
              <ion-icon name="settings-outline"></ion-icon>
              <span>Paramètre</span>
            </li>
            <li>
              <ion-icon name="help-circle-outline"></ion-icon>
              <span>Aide</span>
            </li>
            <li>
              <ion-icon name="flag-outline"></ion-icon>
              <span>Rapport</span>
            </li>
            <li>
              <ion-icon name="chatbox-outline"></ion-icon>
              <span>Envoyer des commentaires</span>
            </li>
          </ul>

          <footer>
            <small>© 2024 </small>
          </footer>
        </aside>
        <ShortContainer />
      </main>
    </div>
  );
}

export default App;
