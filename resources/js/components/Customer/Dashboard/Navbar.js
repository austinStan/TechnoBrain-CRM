import React, { Component } from 'react'
import { Link } from 'react-router-dom'

class Navbar extends Component {
  state = {
    navigate: false,
  };
  onLogoutHandler = () => {
    localStorage.clear();
    this.setState({
      navigate: true,
    });
  };
  render() {
    const user = JSON.parse(localStorage.getItem("userData"));
    const { navigate } = this.state;
    if (navigate) {
      return <Redirect to="/" push={true} />;
    }
    return (
      <nav className="navbar navbar-expand-lg " color-on-scroll="500">
        <div className="container-fluid">
          <a className="navbar-brand" href="/">Dashboard</a>
          <div className="collapse navbar-collapse justify-content-end" id="navigation">
          <h6> Welcome, {user.name}  You have Logged in
            successfully.</h6>
            <ul className="navbar-nav ml-auto">
              <li className="nav-item">
             
                <Link className="nav-link" to='/'>
                  <span className="no-icon" onClick={this.onLogoutHandler}>Log out</span>
                </Link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    )
  }
}

export default Navbar