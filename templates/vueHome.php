
<h4>2. Send an envelope with a remote (email) signer and cc recipient</h4>
<p>The envelope includes a pdf, Word, and HTML document. Anchor text
    (<a href="https://support.docusign.com/en/guides/AutoPlace-New-DocuSign-Experience">AutoPlace</a>)
    is used to position the signing fields in the documents.
</p>
<p>This is a general example of creating and sending an envelope (a signing request) to multiple recipients,
    with multiple documents, and with signature fields for the documents.</p>


<p>API method used:
    <a target='_blank' href="https://developers.docusign.com/esign-rest-api/reference/Envelopes/Envelopes/create">Envelopes::create</a>.
</p>

<form class="eg" action="" method="post" data-busy="form">
    <div class="form-group">
        <label for="signer_email">Signer Email</label>
        <input type="email" class="form-control" id="signer_email" name="signer_email"
               aria-describedby="emailHelp" placeholder="pat@example.com" required
               >
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="signer_name">Signer Name</label>
        <input type="text" class="form-control" id="signer_name" placeholder="Pat Johnson" name="signer_name"
                required>
    </div>
    <div class="form-group">
        <label for="cc_email">CC Email</label>
        <input type="email" class="form-control" id="cc_email" name="cc_email"
               aria-describedby="emailHelp" placeholder="pat@example.com" required >
        <small id="emailHelpCC" class="form-text text-muted">The email for the cc recipient must be different from the signer's email.</small>
    </div>
    <div class="form-group">
        <label for="cc_name">CC Name</label>
        <input type="text" class="form-control" id="cc_name" placeholder="Pat Johnson" name="cc_name"
               required >
    </div>
    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}"/>
    <button type="submit" class="btn btn-docu">Submit</button>
</form>
