import React, { Component } from "react";
import { Link, NavLink } from 'react-router-dom';

export class Sidebar extends Component {
    render() {
        return (
            <div className="sidebar">
                <div className="sidebar-wrapper">
                    <div className="logo">
                        <Link to="/" className="simple-text">
                            Customer Dashboard
                        </Link>
                    </div>
                    <ul className="nav">
                        <li className="nav-item">
                            <NavLink className="nav-link" to="/dashboard">
                                <i className="nc-icon nc-chart-pie-35"></i>
                                <p>Dashboard</p>
                            </NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink className="nav-link" to="/profile">
                                <i className="nc-icon nc-circle-09"></i>
                                <p>User Profile</p>
                            </NavLink>
                        </li>
                    </ul>
                </div>
            </div>
        );
    }
}

export default Sidebar;
