"use client";

import {
    Box,
    AppBar,
    Toolbar,
    Typography,
    IconButton,
    ListItemText,
    Divider,
    Drawer,
    List,
    ListItem,
    ListItemButton,
} from "@mui/material";

import MenuIcon from '@mui/icons-material/Menu';

export default function MygamesLayout({
    children,
}: {
    children: React.ReactNode;
}) {
    return (
        <Box sx={{ display: 'flex' }}>
            <AppBar position="fixed" >
                <Toolbar>
                    <IconButton>
                        <MenuIcon />
                    </IconButton>
                    <Typography
                        variant="h6"
                        noWrap
                        component="div"
                        sx={{ flexGrow: 1 }}
                    >
                        GameHistory
                    </Typography>
                </Toolbar>
            </AppBar>
            <Drawer anchor="left">
                <Box sx={{ width: 240 }}>
                    <Toolbar />
                    <Divider />
                    <List>
                        <ListItem component="a" href="/game-history/mygames" disablePadding>
                            <ListItemButton>
                                <ListItemText primary="My Games" />
                            </ListItemButton>
                        </ListItem>
                        <Divider />
                        <ListItem component="a" href="/game-history/games" disablePadding>
                            <ListItemButton>
                                <ListItemText primary="Games" />
                            </ListItemButton>
                        </ListItem>
                        <Divider />
                    </List>
                </Box>
            </Drawer>
            <Box
                component="main"
                sx={{
                    flexGrow: 1,
                    p: 3,
                    marginTop: "64px",
                    width: "100%",
                    background: 'white',
                }}
            >
                {children}
            </Box>
            <Box
                component='footer'
                sx={{
                    width: '100%',
                    position: 'fixed',
                    textAlign: 'center',
                    bottom: 0,
                    background: '#1976d2',
                }}
            >
                <Typography variant='caption' sx={{ color: 'white' }}>
                    &copy; 2025 GameHistory
                </Typography>
            </Box>
        </Box>
    );
}