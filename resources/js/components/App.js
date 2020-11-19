import React from "react";
import ReactDOM from "react-dom";
import { Route, BrowserRouter, Switch } from "react-router-dom";
import Signup from "../components/auth/Signup/Signup";

function App() {
    return (
        
            <BrowserRouter>
                <Switch>
                    <Route exact path="/" component={Signup} />
                </Switch>
            </BrowserRouter>
        
    );
}

export default App;

if (document.getElementById("root")) {
    ReactDOM.render(<App />, document.getElementById("root"));
}
