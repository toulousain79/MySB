# TODO

## rTorrent

- ~~add timestamp for every annoncer check and compare with the previous check _(don't check for < 1 day)_~~
- ~~add boolean on portal for activate/deactivate annoncer check + add tooltip for the time processing~~
- ~~maybe execute annoncer check _(GetTrackersCert.bsh)_ in other process to not block the addition of new torrent~~
  - ~~temp log redirect for rtorrent_insterted~~
  - ~~temp log redirect for get trackers cert~~
  - ~~while ! -s /home/.check_annoncers_${sUser} gfnAddTracker~~
  - ~~add to /home/.check_annoncers_${sUser} & check if -s /home/.check_annoncers_${sUser} & getTrackercert.lock~~
