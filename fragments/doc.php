<h3>ProseVis Documentation</h3>
<!-- <style type="text/css">body {width: 100%} #container{width: 80%;}
      img class="displayed".displayed {
    display: block;
    margin-left: auto;
    margin-right: auto }</style></head>-->

<div>
	<p>Please note: this documentation is in draft form. Please excuse
		minor errors as we finalize the text.</p>
</div>

<ul>
	<li><a href="#gs">Getting Started</a>
		<ul>
			<li><a href="#dp">Downloading ProseVis</a></li>
			<li><a href="#sd">Using the Sample Dataset</a></li>
		</ul></li>
	<li><a href="#pd">Creating Your Own ProseVis Dataset</a>
		<ul>
			<li><a href="#pw">Data Processing</a></li>
			<li><a href="#ps">Analyze single document</a></li>
			<li><a href="#cm">Compare multiple documents</a></li>
			<li><a href="#results">Data Results</a></li>
		</ul></li>
	<li><a href="#pi">Using the ProseVis Interface</a>
		<ul>
			<li><a href="#tp">Text Panel</a></li>
			<li><a href="#cp">Control Panel</a>
				<ul>
					<li><a href="#dt">Data Tab</a></li>
					<li><a href="#sr">Search Tab</a></li>
					<li><a href="#rt">Render Tab</a></li>



					<li><a href="#com">Comparisons Tab</a></li>

					<li><a href="#se">Settings Tab</a></li>
				</ul></li>





			<!--
       
       <li> <a href="#">Case Studies</a><ul>
       <li> <a href="#">Case Study 1 - Identifying POS Attributes in a Single Text</a></li>
     <li> <a href="#">Case Study 2 - Identifying Sound Attributes in a Single Text</a>
        </li>
            <li><a href="#">Case Study 3 - Identifying Words Attributes in Multiple Texts</a></li>
       <li> <a href="#">Case Study 4 - Identifying MultipleAttributes in a Single Text</a></li>
       <li> <a href="#">Case Study 5 - Multiple Configurations</a></li></ul></li>
                    </ol></li>
      <li>  <a href="#">Appendix</a></li>-->
		</ul>

		<h3>
			<a name="gs"></a>Getting Started
		</h3>
		<h4>
			<a name="dp"></a>Downloading ProseVis
		</h4>

		<div>
			<p>
				ProseVis is open-source software that is freely available for
				download for a diverse range of operating systems: <a
					href="http://tclement.ischool.utexas.edu/ProseVis/code/">http://tclement.ischool.utexas.edu/ProseVis/code/</a>
			</p>
		</div> <img width="600px" class="displayed"
		src="pics/doc/download.png" alt="download" />
		<h4>
			<a name="sd"></a>Using the Sample Dataset
		</h4>
		<div>
			<p>
				Sample datasets are available on the <a
					href="<a 
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					href="http://tclement.ischool.utexas.edu/ProseVis/code/">Downloads
					page</a> for use with this introduction. If you are using the
				sample data, please skip to <a href="#pi">Using The ProseVis
					Interface</a> to learn more about viewing the data in ProseVis.
			
			
			</h3>
			</p>
		</div>
		<div>
			<p>The sample datasets we are making available are four:</p>
		</div>
		<div>
			<p>
				1. Two sets of data (with sound elements and without) from <strong>plays
					by William Shakespeare</strong>, specifically, a comparison of <i>Comedy
					of Errors</i>, <i>King John</i>, <i>Midsummer's Night Dream</i>, <i>Taming
					of the Shrew</i>, <i>Two Gentlemen of Verona</i>, <i>Titus
					Andronicus</i>, <i>Richard the Second</i>, and <i>Richard the Third</i>.
			</p>
		</div>
		<div>
			<p>
				2. Two sets of data (with sound elements and without) from <strong>Gertrude
					Stein's <i>Three Lives</i>
				</strong> compared with <strong><a
					href="http://docsouth.unc.edu/fpn/">First Person Narratives of the
						American South</a> </strong> from the Documenting the American
				South collection. These include: Grimball, Margaret Ann Meta Morris,
				1810-1881. <i>Journal of Meta Morris Grimball: South Carolina</i>,
				December 1860-February 186. Pringle, Elizabeth Waties Allston. <i>A
					Woman Rice Planter.</i> Avary, Myrta Lockett. <i>A Virginia Girl in
					the Civil War, 1861-1865.</i> Dawson, Sarah Morgan. <i>A
					Confederate Girl's Diary.</i> Veney, Bethany. <i>The Narrative of
					Bethany Veney: A Slave Woman.</i>. Jacobs, Harriet A. (Harriet
				Ann). <i>Incidents in the Life of a Slave Girl, Written by Herself</i>.
				Ward, Dallas T. <i>The Last Flag of Truce.</i> Malone, Bartlett
				Yancey. <i>The Diary of Bartlett Yancey Malone.</i> McLeary, A. C. <i>Humorous
					Incidents of the Civil War</i>. Horton, George. <i>The Life of
					George M. Horton. The Colored Bard of North Carolina</i>.
			</p>
			<p>
				A reading using the Stein dataset appears in Clement, T., Tcheng,
				D., Auvil, L., Capitanu, B., and Barbosa, J. "Distant Listening to
				Gertrude Stein's 'Melanctha': Using Similarity Analysis in a
				Discovery Paradigm to Analyze Prosody and Author Influence." <i>Literary
					and Linguistic Computing</i> (accepted for publication).
			</p>
		</div>
		<h3>
			<a name="pd"></a>Creating Your Own ProseVis Dataset
		</h3>
		<h4>
			<a name="pw"></a>Data Processing
		</h4>

		<p>
			The ProseVis data processing webform allows ProseVis users to upload
			TEI P5 files for pre-processing in Meandre, a data flow environment
			designed by the <a href="">SEASR</a> group (Software Environment for
			the Advancement of Scholarly Research) at the University of Illinois
			at Urbana-Champaign�s National Center for Supercomputing Applications
			(NCSA) and Graduate School of Library and Information Science.
			Meandre pre-processes TEI P5 texts for analysis. The user creates the
			TEI file. Once uploaded through the web form, the TEI file is
			processed by Meandre, which creates the corresponding TSV files that
			ProseVis reads described below in <a href="#results">Data Results</a>.
			Because ProseVis depends on the structural elements of a files such
			as the &lt;p&gt; or paragraph element or the &lt;lg&gt; line group or
			&lt;l&gt; line elements, the ProseVis Meandre instantiation will only
			take TEI P5 texts at this time, not plain text files. [Please go to <a
				href="http://www.tei-c.org">www.tei-c.org</a> to find out more about
			the TEI encoding guidelines.]

		</p>
		<p>
			The web form through which a user can process their TEI P5 document
			in the ProseVis project is available at <a
				href="http://tclement.ischool.utexas.edu/ProseVis/data/">
				http://tclement.ischool.utexas.edu/ProseVis/data/</a>. Users can
			upload <strong>a single</strong> or <strong>multiple</strong> files
			for pre-processing.
		</p>


		<h4>
			<a name="ps"></a>Analyze single document
		</h4>
		<p>To process just one file, enter the email address where you would
			like to receive your processed file, choose a job name for this test
			(optional), browse for your XML file on your system and select your
			file for uploading. Finally, fill out the Catpcha form before
			selecting submit.</p> <img width="400px" class="displayed"
		src="pics/doc/upload.png" alt="" />
		<p></p>

		<h4>
			<a name="cm"></a>Compare multiple documents
		</h4>
		<p>
			Processing multiple files is a more advanced option in ProseVis that
			allows you to take advantage of the similarity-based discovery
			system. In the ProseVis webform, the researcher is given the
			opportunity to upload a selection of texts, and control the features
			to use for the analysis. <strong>Note:</strong> To compare multiple
			files, you must upload the files in a zipped file. ZIP files must
			contain only the files for processing, no subdirectories.
		</p> <img width="800px" class="displayed" src="pics/doc/multiple.png"
		alt="" />


		<p>The following are the features researchers can use to control the
			experiment:</p>

		<p>
			<strong>Comparison Range</strong> &mdash; This is a comma-separated
			list of indices of the documents to be compared. For example, the
			user can choose to compare just the first document with the remaining
			documents in a set by using '1'. Using '1, 3, 7' means that the
			first, third, and seventh documents will be compared against each
			other and all of the other documents. Using 'all' means that all
			documents will be compared with each other. To change the order of
			your documents, you must change the name. Ordinarily files are listed
			in alphanumerical order.
		</p>

		<p>
			<strong>Window Size</strong> in Sounds &mdash; This is the number of
			phonemes to be considered a phrase for analysis. Because we are
			working on prosodic patterns that are affected by phrasal patterns
			(Clement, et al., 2013), it makes sense for this value to represent
			the average number of sounds in a phrase. If texts use shorter
			phrases, then a smaller window serves as a better representation of
			the average phrase size for a given text. If texts have longer
			phrases, then a larger window might yield more productive results.
		</p>

		<p>
			<strong>Sound Features to Use</strong> &mdash; This refers to the
			attributes of the sounds, which are determined from the features
			extracted by <a href="http://mary.dfki.de/">OpenMary</a> (Modular
			Architecture for Research on speech sYnthesis), an open-source
			text-to-speech system that we have included as a pre-processing
			module in <a href="">Meandre</a>. The features can be used one at a
			time or in combination. The sound features that we use as the default
			selection include (1) <strong>part of speech</strong>; (2) <strong>accent</strong>,
			which indicates the pitch of the sound; (3) <strong>stress</strong>,
			which indicates the presence of a primary or secondary lexical
			stress; (4) <strong>break index</strong>, which indicates when sounds
			precede phrase breaks, sentence breaks, and paragraph final breaks;
			and (5) <strong>tone</strong>, which indicates the location of
			prosodic boundaries and pitch accents by assigning sentence type
			(e.g., declarative, interrogative-W, interrogative-Yes-No and
			exclamatory). These above features focus the machine learning on
			prosodic features that research has shown reflect prosody such as
			part of speech, accent, stress, tone, and break index. If users are
			also interested in comparing the words or sounds themselves, the user
			can also select (6) <strong>sound</strong>, but this feature is not a
			default selection.
		</p>

		<p>
			<strong>Weighting Power</strong> &mdash; This number radically
			controls the behavior of the instance-based learner. Valid values are
			in the range 0 to 100. When weighting power is set to the highest
			value, it heavily weights close matches when computing similarity.
			When set to the lowest value it equally weights all matches. Higher
			weighting power values caused our instance-based learning system to
			use a nearest-neighbor strategy. With lower values more weight is
			given to distant examples, which effectively increases the
			neighborhood size. When set to zero, all training examples are
			equally weighted resulting in a constant prediction reflecting the
			baseline class probabilities.
		</p>

		<h4>
			<a name="results"></a>Data Results
		</h4>
		<p>Your processed XML file and corresponding TSV will be mailed to you
			after some time (more or less depending on how many files you have
			uploaded). You will receive an email wth a link to a ZIP file
			containing a new data set including two types of files: XML and TSV.
		</p>
		<p>
			The <strong>TSV file</strong> contains tabulated data produced by
			OpenMary and the similarity data produced in Meandre. Rendering this
			data is controled in the <a href="#rt">Render Tab</a> and the <a
				href="#com">Comparisons Tab</a>.
		</p> <img width="800px" class="displayed" src="pics/doc/tabdata.png"
		alt="" />
		<p>&nbsp;</p>
		<p>
			The <strong>XML file</strong> will match your uploaded file exactly
			except for the addition of two attributes "xmlns:seasr" and
			"seasr:id" - both of which help ProseVis map the data in the TSV file
			to the XML file structure in the ProseVis <a href="#tp">Text Panel</a>.
		</p> <img width="700px" class="displayed" src="pics/doc/xml.png"
		alt="" />



		<h3>
			<a name="pi"></a><strong>Using The ProseVis Interface</strong>
		</h3>

		<p>
			Opening ProseVis simultaneously launches two panels &mdash; the <a
				href="#tp">Text Panel</a> and the <a href="#cp">Control Panel</a>.
		</p>
		<h4>
			<a name="tp"></a><strong>Text Panel</strong>
		</h4>
		<p>
			When first launched, the screen will be blank. The Text Panel
			displays all rendering and search results once you have <a href="#af">added
				a file</a> from the <a href="#cp">Control Panel</a>.
		</p>
		<p>
			Once a text has been loaded, its default rendering shows a phrase per
			line without any features colored. When a user moves the cursor over
			a word in ProseVis, the tool tip displays the features of the
			selected word including <a href="#pos">part-of-speech</a>, <a
				href="#sound">sound</a>, and <a href="#mst">similarity data</a>.
		</p> <img width="800px" class="displayed" src="pics/doc/text.png"
		alt="" /><br /> <img width="800px" class="displayed"
		src="pics/doc/text2.png" alt="" />

		<ul>

			<li><a name="pos"></a><strong>Part-of-Speech (POS)</strong> Here, the
				part-of-speech is a noun (NN). The University of Pennsylvania
				Treebank Tag-set is a useful glossary: <a
				href="http://www.comp.leeds.ac.uk/ccalas/tagsets/upenn.html">http://www.comp.leeds.ac.uk/ccalas/tagsets/upenn.html</a>
			</li>

			<li><a name="sound"></a><strong>Sound</strong> The sound is based on
				the International Phonetic Alphabet (h E|v @ n). The ASCII to
				International Phonetic Alphabet Reference Guide is a useful
				glossary: <a
				href="http://www.antimoon.com/resources/phonchart2008.pdf">http://www.antimoon.com/resources/phonchart2008.pdf</a>
			</li>
			<li><a name="mst"></a><strong>Most Similar To</strong> This indicates
				other texts to which the highlighted word is most similar.
				Similarity is described in the <a href="#com">Comparison Tab</a> in
				the <a href="#cp">Control Panel</a>.</li>
		</ul>
		<h4>
			<a name="cp"></a><strong>Control Panel</strong>
		</h4>
		<p>
			The Control Panel is the source for all operations executed on the
			Text Panel in ProseVis. There are six tabs at the top of the panel. <strong>Note:
				if the Control Tab disappears, the hot key "c" will bring it back.</strong>
		</p>
		<ul>
			<li><a name="dt"></a><strong>Data Tab</strong>
				<p>Go to the Data tab to add, remove, and adjust texts in the Text
					Panel.</p>
				<ul>
					<li><a name="af"></a><strong>Add File</strong>
						<p>To add a file, click Add File and you will be taken to a
							browser that will allow you to find files in your file directory
							system. Again, ProseVis will only allow you to add TSV files.
							Once a file has been successfully added, it will appear in the
							Text Panel. The name of the file appears at the top of the panel.
						</p> <img class="displayed" width="800px" src="pics/doc/open.png"
						alt="" />
					</li>
					<li><a name="amf"></a><strong>Add Multiple Files</strong>
						<p>ProseVis is designed to compare texts - users can add multiple
							files at once. Larger screens allow for the addition of more
							files.</p>
					</li>
					<li><a name="rf"></a><strong>Remove Files</strong>
						<p>To remove a file click on an individual file in the Data tab
							and the Remove Files button. Only the file selected will be
							removed.</p></li>
					<li><a name="cf"></a><strong>Clear Files</strong>
						<p>Clicking on Clear Files will remove all open files. Closing the
							software will automatically clear all open files and schemes.</p>
					</li>
					<li><a name="M"></a><strong>Move to Top</strong>
						<p>The Move to Top button allows the user to rearrange how the
							files are presented. Select a text and click on Move to Top
							button.</p></li>
				</ul></li>


			<li><a name="sr"></a><strong>Search Tab</strong>
				<p>
					The user can search by <a href="#word">Word</a>, <a href="#pos">Parts-of-Speech</a>,
					or <a href="#ssf">Sounds</a> (Full, Initial, Vowel, Final) across
					single or multiple texts. For multiple texts, all files must be
					highlighted in the right-hand panel. All searches are case
					sensitive.
				</p>

				<ul>
					<li><a name="word"></a><strong>Search by Word</strong> <img
						class="displayed" src="pics/doc/wordsearch.png" width="800px"
						alt="" /></li>

					<li><a name="pos"></a> <strong>Search by Part-of-speech</strong>.
						<p>POS searches must be capitalized (e.g. NN, VB, DT, RB).</p> <img
						class="displayed" src="pics/doc/searchpos.png" width="800px"
						alt="" /> <br /> <img width="800px" class="displayed"
						src="pics/doc/searchpos2.png" alt="" /></li>
					<li><strong>Search by Soundex</strong>.
						<p>
							A description of the Soundex alorithm can be found on <a
								href="http://en.wikipedia.org/wiki/Soundex">Wikipedia</a>.
						</p>
					</li>



					<li><a name="ssf"></a><strong>Search by Full Sound</strong>.
						<p>
							Each sound in a word is broken into three primary parts -- the
							leading consonant sound, the vowel sound, and the ending
							consonant sound. Sounds are revealed in the tool tip that results
							by mousing over any word in the <a href="#tp">Text Panel</a>.
						</p> <img width="800px" class="displayed"
						src="pics/doc/soundparts.png" alt="" />
						<p>In the example below, the full sound "r=" appears in "meteor"
							and "our."</p> <img class="displayed" width="800px"
						src="pics/doc/searchsf.png" alt="" />
					</li>

					<li><a name="ssi"></a><strong>Search by Initial Sound</strong><img
						width="800px" class="displayed" src="pics/doc/searchsi.png" alt="" />
					</li>
					<li><strong><a name="ssv"></a>Search by Vowel Sound</strong><img
						width="800px" class="displayed" src="pics/doc/searchsv.png" alt="" />
					</li>
					<li><strong><a name="ssf"></a>Search by Final Sound</strong><img
						width="800px" class="displayed" src="pics/doc/searchsfi.png"
						alt="" /></li>

				</ul></li>

			<li><strong><a name="rt"></a>Render Tab</strong>:
				<p>This is where the user can manage what and how content will
					appear in the Text Panel.</p> <img class="displayed" width="800px"
				src="pics/doc/custom1.png" alt="" />

				<ul>
					<li><p>
							The user can choose the <strong>chunk of text</strong> that
							comprises <strong>each line</strong> in the Text Panel such as a
							phrase per line or lines, line groups, sentences, paragraphs, or
							sections per line
						</p> <img class="displayed" width="800px"
						src="pics/doc/render2.png" alt="" />
					</li>
					<li><p>
							The user can choose the <strong>text</strong> that will appear in
							the Text Panel such as words, parts-of-speech or sounds <br /> <img
								width="800px" class="displayed" src="pics/doc/render3.png"
								alt="" />
						</p></li>
					<li><p>
							The user can choose the <strong>information</strong> that appears
							in the <strong>tool tip</strong><br /> <img width="800px"
								class="displayed" src="pics/doc/text.png" alt="" />.
						</p>
					</li>
					<li><p>
							Users can also create and save <strong>customizable color schemes</strong>
							with the Custom Color Scheme Builder
						</p> <img width="800px" class="displayed"
						src="pics/doc/render.png" alt="" />
					</li>

				</ul>
				<ul>
					<li><a name="ccsb"></a><strong>The Custom Color Scheme Builder</strong>
						<p>This works in conjunction with the "Attribute Type" to allow
							the user to determine what will be highlighted.</p>
						<ul>
							<li><p>
									The user can <strong>Choose Color</strong> by "Working color
									scheme" and then select an Attribute type by which to color the
									text. The colors for singular and plural nouns are customized
									in the Control Panel.
								</p> <img width="600px" class="displayed"
								src="pics/doc/custom2.png" alt="" />
								<p>Colors for singular and plural nouns are shown in the Text
									Panel.</p> <img width="800px" class="displayed"
								src="pics/doc/custom3.png" alt="" />
							</li>
							<li><p>
									The user can <strong>Save customized color schemes</strong> by
									choosing a Name and selecting "Save to File" Customized color
									schemes can be implemented from the <a href="#se">Settings Tab</a>.
								</p>
							</li>
						</ul></li>
				</ul>
			</li>



			<li><strong> <a name="com"></a>Comparisons Tab
			</strong><br />
				<p>
					In this tab, advanced users can see the results of the similarity
					data layered on top of the text. The similarity data results from
					the <a href="#dp">Data Processing</a> step of <a href="#cm">Comparing
						Multiple Texts</a> with Meandre. Once you have received your
					results from Meandre and have added at least one of the files in
					the <a href="#dt">Data Tab</a> each text in the comparison set will
					be represented in Comparisons Tab by a different color (listed on
					the right side of the tab with the file names).
				</p> <img class="displayed" width="600px" src="pics/doc/com1.png"
				alt="" />
				<ul>
					<li><p>Once the user has selected "Refresh", each sound in the Text
							Panel will be highlighted according to which text the software
							has determined it is most likely to belong. When all the texts
							are selected, the color of the sound reflects which book has the
							highest probability or comparison for a given sound.</p> <img
						class="displayed" width="800px" src="pics/doc/com2.png" alt="" /><br />
						<span align="center"><p>Each sound highlighted according to
								comparison data results</p> </span></li>

					<li><strong>Smoothing</strong>
						<p>This is a technique used in image processing and statistics to
							"blur" out more detailed features and emphasize the larger scale
							features. In ProseVis, smoothing is used to find longer patterns
							by averaging the similarity values over a neighborhood. Smoothing
							is necessary to take into account the context of the syllable
							with respect to its neighbors. The smoothing function averages
							the similarity values of the N neighbors to the left and to the
							right of the syllable with a window size of 2*N + 1. Users can
							change the parameters in smoothing from 1-19 to see what provides
							the most productive view of the data. Smoothing changes can
							sometimes be dramatic or subtle.</p> <img class="displayed"
						width="800px" src="pics/doc/com3.png" alt="" /><br /> <span
						align="center"><p>The sounds "smoothened" statistically to
								increase the visibility of the results</p> </span>
					</li>
					<li><p>
							When looking at data for multiple files at once it can be useful
							to deselect <strong>Allow self similarity</strong> since the
							colors will change to reflect the highest probabilities that
							remain after taking the text itself out of the comparison set.
							This is particularly useful when you are working with multiple
							files.
						</p> <img class="displayed" width="800px" src="pics/doc/com5.png"
						alt="" /><br /> <span align="center"><p>Results with self
								similarity selected</p> </span> <img class="displayed"
						width="800px" src="pics/doc/com6.png" alt="" /><br /> <span
						align="center"><p>Results with self similarity deselected</p> </span>
					</li>

					<li>
						<p>
							In general, when <strong>the similarity results from certain
								texts are deselected</strong> on the panel, the colors change to
							reflect the highest similarity probabilities that remain.
						</p> <img class="displayed" width="800px" src="pics/doc/com7.png"
						alt="" /><br /> <span align="center"><p>Similarity results
								deselected</p> </span>
					</li>

					<li><strong> <a name="se"></a>Settings Tab
					</strong>
						<ul>
							<li><p>
									Advanced users can implement and manage their own color schemes
									from this tab. Create color schemes with the <a href="#ccsb">The
										Custom Color Scheme Builder</a> in the <a href="#rt">Render
										tab</a>. Once you have created your color scheme on the Render
									tab, it will automatically be loaded and it will appear in the
									<em>Color by</em> drop down on the Render tab. You can also
									write your own color scheme in a plain text file and implement
									it in the Settings Tab by selecting that scheme in the window
									and selecting <em>Load scheme</em>. After the scheme is loaded,
									it will also appear in the <em>Color by</em> drop down on the
									Render tab. If you <em>Remove scheme</em>, the scheme will no
									longer appear in that drop down menu.
								</p> <img class="displayed" width="800px"
								src="pics/doc/colorscheme2.png" alt="" /> <br /> <img
								class="displayed" width="800px" src="pics/doc/colorscheme1.png"
								alt="" />
							</li>
						</ul></li>

				</ul>
			</li>

		</ul> <!--     <li><a name="#">ProseVis Text Panel Display</a></li>
        </ol></li>
        
        <li><a name="#">Search Tab</a></li>
        
        <li> <a name="#">Render Tab</a></li>
        <li><a name="#">Line Breaks By</a></li>
        <li> <a name="#">Text</a></li>
        <li><a name="#">Attribute Types</a></li>
        <li> <a name="#">Case Studies</a></li>
        <li> <a name="#">Case Study 1 - Identifying POS Attributes in a Single Text</a></li>
        <li> <a name="#">Case Study 2 - Identifying Sounds Attributes in a Single Text</a>
        </li>
        <li><a name="#">Case Study 3 - Identifying Words Attributes in Multiple Texts</a></li>
        <li> <a name="#">Case Study 4 - Identifying MultipleAttributes in a Single Text</a></li>
        <li> <a name="#">Case Study 5 - Multiple Configurations</a></li>
        <li><a name="#">Creating and Saving Color Schemes</a></li>
        <li>  <a name="#">Appendix</a></li>
        
        
        -->