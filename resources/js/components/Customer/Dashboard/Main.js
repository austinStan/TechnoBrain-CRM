import React, { Component } from "react";
import Sidebar from "./Sidebar";
import Navbar from "./Navbar";
import Footer from "./Footer";
import { Switch, Route, Redirect } from "react-router-dom";
import Dashboard from "./Dashboard";
import Userprofile from "./Userprofile";

export class Main extends Component {
    render() {
        return (
            <div className="wrapper">
                <Sidebar />
                <div className="main-panel">
                    <Navbar />
                    <Switch>
                        <Route path="/dashboard" component={Dashboard} />
                        <Route path="/profile" component={Userprofile} />
                        {/* <Redirect from="*" to="/dashboard" /> */}
                    </Switch>
                    <Footer />
                </div>
            </div>
        );
    }
}

export default Main;
