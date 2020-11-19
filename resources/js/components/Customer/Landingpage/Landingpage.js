import React from "react";
import { Button } from "@material-ui/core";

function Landingpage() {
    return (
        <div style={{ textAlign: "center",marginTop: "50px" }}>
            <Button
                variant="outlined"
                color="primary"
                style={{ textTransform: "none", marginRight: "8px" }}
            >
                Login
            </Button>

            <Button
                variant="outlined"
                color="success"
                style={{ textTransform: "none" }}
            >
                Register
            </Button>
        </div>
    );
}

export default Landingpage;
