This is a first stab at an addition for Neatline Text that will allow a user to annotate a text on its corresponding map as the user views the text and map.

The basic series of events is:
1. User highlights text selection for annotation.
2. User right-clicks.
3. A small window or "modal" pops up, presenting the user with
    (a) the highlighted text from the page,
    (b) a link to create an annotation on the map, and
    (c) a "confirm"-type option to apply the annotation to the text.
Options (a), (b), and (c) correspond to three different pages on a given Neatline Text exhibit, hereafter known as
    (a) "viewer" - the page where users view text and map together,
    (b) "map_editor" - the page for adding what Neatline calls a "record" to the map, and
    (c) "text_editor" - the page for associating a record with a selection of text via Neatline Text.
4. User clicks on option (b) in the small window.
5. User is taken to the map_editor page on a new tab. If the user hasn't signed in, this will need to happen now.
6. The annotated text is pasted, with appropriate HTML formatting, into the "Body" box. User then adds a Slug and Title. (Starter formula for coming up with a slug: SLUG = LOWERCASE TITLE WITH DASHES BETWEEN WORDS.)
7. User adds whatever Neatline options to their annotation they wish.
8. User clicks "Save" at the bottom of the screen; user can then close map_editor.
9. Back on viewer, user clicks on option (c) in the small window.
10. User's content imputted
11. User cliks ok
12. User closes small window
Ta-da! 

N.B.: this demo employs Bootstrap styling, which can be removed if necessary.