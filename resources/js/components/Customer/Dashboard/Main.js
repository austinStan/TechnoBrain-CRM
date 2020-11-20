import React, { Component } from "react";
import Sidebar from "./Sidebar";
import Navbar from "./Navbar";
import Footer from "./Footer";
import { Switch, Route, Redirect } from "react-router-dom";


export class Main extends Component {
    render() {
        return (
            <div className="wrapper">
                <Sidebar />
                <div className="main-panel">
                    <Navbar />
                    <Footer />
                </div>
            </div>
        );
    }
}

export default Main;
