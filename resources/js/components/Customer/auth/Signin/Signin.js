import React from "react";
import { Paper, withStyles, Grid, TextField, Button, FormControlLabel, Checkbox } from '@material-ui/core';
import { Face  } from '@material-ui/icons';
import LockIcon from '@material-ui/icons/Lock';
import { Link } from 'react-router-dom';
const styles = theme => ({
    margin: {
        margin: theme.spacing.unit * 2,

    },
    padding: {
        padding: theme.spacing.unit
    }
});

class Signin extends React.Component {
    render() {
        const { classes } = this.props;
        return (
            <>
            <div>
            <h2 style={{textAlign: "center",marginTop:"50px"}}>Customers Relation Management</h2>
            <h4 style={{textAlign: "center",marginTop:"60px"}}>SignUp As Customer</h4>
            </div>
            <Paper className={classes.padding} style={{ marginLeft: "20%",marginTop: "50px",marginRight: "20%"}}>
                <div className={classes.margin} >
                    <Grid container spacing={2} alignItems="flex-end">
                        <Grid item>
                            <Face />
                        </Grid>
                        <Grid item md={true} sm={false} xs={false}>
                            <TextField id="email" label="Email Address" type="email" fullWidth autoFocus required />
                        </Grid>
                    </Grid>
                    <Grid container spacing={2} alignItems="flex-end">
                        <Grid item>
                            <LockIcon />
                        </Grid>
                        <Grid item md={true} sm={false} xs={false}>
                            <TextField id="password" label="Password" type="password" fullWidth required />
                        </Grid>
                    </Grid>
                    <Grid container alignItems="center" justify="space-between">
                        <Grid item>
                            <FormControlLabel control={
                                <Checkbox
                                    color="primary"
                                />
                            } label="Remember me" />
                        </Grid>
                        <Grid item>
                            <Button disableFocusRipple disableRipple style={{ textTransform: "none" }} variant="text" color="primary">Forgot password ?</Button>
                        </Grid>
                    </Grid>
                    <Grid container justify="center" style={{ marginTop: '10px'}}>
                        <Button variant="outlined"  color="primary" style={{ textTransform: "none",marginRight:'4px' }}>Login</Button>
                      <Link to='/'><Button variant="outlined"  color="secondary" style={{ textTransform: "none" }}>Home</Button></Link>
                    </Grid>
                    
                </div>
            </Paper>
            </>
        );
    }
}

export default withStyles(styles)(Signin);