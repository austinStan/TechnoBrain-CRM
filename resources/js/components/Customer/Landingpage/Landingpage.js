import React from "react";
import { Button } from "@material-ui/core";
import { Link } from "react-router-dom";

function Landingpage() {
    return (
        <div style={{ textAlign: "center",marginTop: "50px" }}>
            <Link to ="/signin">
            <Button
                variant="outlined"
                color="primary"
                style={{ textTransform: "none", marginRight: "8px" }}
            >
                Login
            </Button>
            </Link>
            <Link to ="/signup">
            <Button
                variant="outlined"
                color="success"
                style={{ textTransform: "none" }}
            >
                Register
            </Button>
            </Link>
        </div>
    );
}

export default Landingpage;
