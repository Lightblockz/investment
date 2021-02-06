<!-- Sign up modal -->
<div class="modal fade" id="mou-modal" tabindex="-1" role="dialog" aria-labelledby="signupLabel">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header text-center">

                <h4 class="modal-title text-center">MEMORANDUM OF UNDERSTANDING</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" name="button"><span style="color:white" aria-hidden="true">&times;</span></button>

            </div>

            <div class="modal-body">
            <div class="mou-div">

<div class="">

<p class="mou-text">
<b>THIS MEMORANDUM OF UNDERSTANDING</b> is made this <b>{{ Carbon\Carbon::now()->isoFormat('Do') }} day of {{ Carbon\Carbon::now()->isoFormat('MMMM') }} {{ Carbon\Carbon::now()->isoFormat('YYYY') }}</b> <br>
<b>BETWEEN</b> <br>
<b>LIGHT BLOCKS ENTERPRISE</b> of No 9 Irebawa, Ogba, Lagos. (hereafter referred to as
‘Light Blocks’ which expression shall where the context admits include its heirs,
executors, administrators, assigns and all those deriving title/possessory rights
through it) of the one part
<b>AND </b> <br>
<b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</b> (hereinafter referred to as
the ‘Investor’) which expression shall where the context so admits include his/her
heirs, executors, administrators, assigns and all those deriving title/possessory
right through her) of the other part. 
<br>
<b>WHEREAS</b>
<ul>
    <li>
        Light Blocks is a duly registered business under PART A of the COMPANIES ANDALLIED MATTERS ACT 1990 with BN 3079495.
    </li>
    <li>
        Light Blocks is certified to conduct block chain education, crypto currency investment/education, and crypto currency trading.
    </li>
    <li>
        Light Blocks engages in crypto currency trading with funds of investors.
    </li>
    <li>
        Light Blocks pays an agreed percentage at a fixed date to itsinvestors.
    </li>
    <li>
        The Investor is desirous of investing the sum of ₦{{ number_format(Session::get('bank_transfer')['capital_amount']) }} with Light Blocks.
    </li>
    <li>
        Both parties have AGREED that the above stated consideration be used for the sole purpose of crypto currency trading.
    </li>
</ul>
<br>

<b>NOW THIS AGREEMENT WITNESSES AS FOLLOWS</b> <br>

Pursuant of the terms contained in this Agreement and for the abovementioned
consideration as agreed by the parties, Light Blocks acknowledges the receipt of
the sum of <b>₦{{ number_format(Session::get('bank_transfer')['capital_amount']) }}</b> from the Investor and AGREES to pay the
Investor <b>{{ Session::get('bank_transfer')['interest'] * 100 }}%</b> of the above consideration, being the sum of <b>₦{{ number_format(Session::get('bank_transfer')['capital_amount'] * Session::get('bank_transfer')['interest']) }}</b> every 1 month.
<br> <br>

<b>COMMENCEMENT</b>
<br>
This Memorandum of Understanding shall commence from the Date above
mentioned and shall continue to be in operation, unless terminated in accordance
with the provisions of this Memorandum or upon a written agreement duly
executed between both parties.

<br>
<b>TERMS OF CONTRACT</b>

<ul>
    <li>
        Both parties AGREE that the initial sum of <b>₦{{ number_format(Session::get('bank_transfer')['capital_amount']) }}</b> invested by the investor shall remain with Light Blocks for a period of <b>{{ round(Session::get('bank_transfer')['plan_duration'] / 30) }}</b> months, while accumulating the agreed monthly interest.
    </li>
    <li>
        The Investor is allowed to withdraw both the total capital and interest at the end of 
        <b>{{ round(Session::get('bank_transfer')['plan_duration'] / 30) }}</b> month(s) period, 
        which event shall bring this contract to an end.
    </li>
    <li>
        Without prejudice to the above, after the <b>{{ round(Session::get('bank_transfer')['plan_duration'] / 30) }}</b> month(s) 
        window the Investor shall be entitled to the following options. (a) Keep the entire funds including
        capital and interest with Light Blocks for further trading. (b) Withdraw all or part
        of the funds while keeping the remaining funds for further trading by Light
        Blocks.
    </li>
    <li>
        Where 24 hours prior to the monthly due date, the Investor fails to direct Light
        Blocks on what course of action to take regarding the investment, Light Blocks
        shall pay the agreed interest to the provided account of the Investor.
    </li>
    <li>
        Light Blocks shall have no restrictions regarding the use of the Capital
        Investment, with the exception of use on activities and operations unrelated to
        Light Blocks’ objectives, illicit or illegal activities.
    </li>
    <li>
        All payments to Light Blocks shall be made in the form of Bank transfers into the
        bank account, details: Samuel Joseph, Gtbank (Savings), 0111375104.
    </li>
    <li>
        Samuel Joseph being the Chief-Executive-Officer of Light Blocks shall receive all
        payments through the above mentioned bank account on behalf of Light Blocks.
    </li>
    <li>
        All payments done by Light Blocks to the Investor shall be made in the form of
        Bank transfer into the bank account, details:…………………………………………………..
    </li>

    
    <li>
        All Payments done by Light Blocks shall only be on working days and not weekends.
    </li>
    <li>
        The investment provided by the Investor is money belonging to the investor and
        shall be treated as such, as same is neither a loan nor accruing from any illegal
        source and activity.
    </li>
    <li>
        Light Blocks shall make the agreed interest available for withdrawal by the
        Investor at the agreed time every month.
    </li>
    <li>
        The Investor cannot withdraw his interest before the termination date except
        for Investors whose investments are predicated on the monthly interest
        withdrawal option. However, investors whose withdrawal option is not monthly
        based would be penalize if they intend to suddenly withdraw their monthly
        interest.
    </li>
    <li>
    The Investor is entitled to a monthly or quarterly reportsubjectto the agreement of parties.
    </li>
</ul>

    <b>DISPUTE RESOLUTION</b>
    <br>

In the event of a dispute leading to the termination of the Agreement due to the
infringement of the terms and conditions herein, the parties are to provide one
representatives and a neutral and mutually agreed third party to mediate on the
matter and should only resort to litigation upon the failure of this ADR mechanism.

<br>


<b>AMENDMENTS</b>
<br>

No waivers, amendments and/or modification to this Contract shall be deemed
valid and/or binding unless/except agreed upon by the written consent of both
parties.

<b>DETERMINATION</b>
<br>

This MOU / Agreement shall continue to exist except terminated by the mutual
written consent of both parties or upon the breach of this contract.


<b>NATURE OF RELATIONSHIP</b>
<br>

<ul>
    <li>
        Nothing in this agreement should be construed as making the Investor a
        stakeholder or a shareholder in Light Blocks.
    </li>
    <li>
        The Investor is not entitled to the profits of Light Blocks beyond the mutually
        agreed percentage on the investment.
    </li>
    <li>
        The Investor shall not be held liable to any third party in the event of losses
        suffered by Light Blocks or failure of Light Blocks to meet its obligation to such a
        third party.
    </li>
</ul>

<br>
<b>NOTICES</b>
<br>
<ul>
    <li>
        Any notice or communication to any party shall be deemed sufficiently given on
        delivery and 24 hours after the same is sent by text message, email, WhatsApp
        or any reputable courier company, duly addressed to the party to which the
        same is required to be given at the registered address of such a party or the
        address given by such party for the purpose of such notice or as specified in this
        Agreement.
    </li>
    <li>
        The investor shall be entitled to a 24hours prior notice in the event of a delay of
        his/her monthly payment whose investments is predicated on the monthly
        interest withdrawal option.
    </li>
    <li>
        In the event of the above, such a delay shall be rectified on or before 7 days and
        payments made to the investor.
    </li>
</ul>


<br>
<b>BREACH AND TERMINATION</b>
<br>

<ul>
    <li>
        A breach of this Agreementshall be deemed to arise where either party commits
        a breach or default of any of the fundamental or material terms or covenants of
        this Agreement.
    </li>
    <li>
        In the event of a breach or default occurring hereof the defaulting party shall not
        later than thirty (30) working days from the date of receipt of a Notice of
        Complaint in writing from the innocent party drawing attention to the breach or
        default take necessary and reasonable steps to remedy the breach or default.
    </li>
    <li>
        Where the breach or default is not remedied, the innocent party shall give to the
        defaulting party Seven (7) working days’ notice in writing of its intention to
        terminate this Agreement. Such termination shall not affect the accrued or
        subsisting rights, obligations and or interests of the parties.
    </li>
    <li>
        In the event parties hereto are both at fault, then they shall bear the respective
        liabilities for the breach in accordance with the actual default committed by the
        parties.
    </li>
    <li>
        Nothing in the above shall preclude the aggrieved party from instituting a civil or
        criminal action against the defaulting party in the event of a serious breach of
        contract upon the failure of the ADR mechanism.
    </li>
</ul>


<b>SURVIVAL OF CAUSES OF ACTION</b>

<br>

<ul>
    <li>
        The termination of this Agreement howsoever occurring shall not affect the
        rights of the parties already accrued at such time nor affect the continuance in
        force ofsuch provisions as are expressed as or capable of having effect aftersuch
        termination.
    </li>
    <li>
        In the event of the death or legal incapacity of the investor to exercise his/her
        rights as contained herein, such a right can be exercised by the investor’s Next-of-kin.
    </li>
    <li>
        Details of investor’s Next of kin:
        <br>
        Name:
        <br>
        Address:
        <br>
        Relationship with the Investor:
    </li>
</ul>

<br>
<b>INDEMNITY</b>

<br>


<ul>
    <li>
        The Investor shall be indemnified within 12 months by Light Blocks in the case of
        loss of the investor’s capital investment during the course oftrading.
    </li>
    <li>
        The investor shall be indemnified within 7 days by Light Blocks in the event of a
        delay in payment of the agreed investors’ interest.
    </li>
</ul>


<b>GENERAL</b>
<br>

<ul>
    <li>
        The provisions of this Agreement are severable. Any determination that any
        provision of this Agreement is illegal, void or unenforceable shall not affect the
        validity of any other provision of this Agreement.
    </li>
    <li>
        This Agreement shall be binding on all the parties, their assigns and successorsin title. This Agreement shall not confer any rights upon any person other than
        the parties named herein. The parties hereto shall have no obligation or duty
        hereunder to anyone other than a party named herein.
    </li>
    <li>
        Nothing in this Memorandum of Understanding shall constitute or be deemed to
        constitute a partnership between the parties or render a party an agent of the
        other for any purpose whatsoever. Neither party shall have the power and
        authority to bind the other to contract or to create any liability whatsoever.
    </li>
    <li>
        This Memorandum of Understanding or any right, duty or obligation undertaken
        is not assignable or transferable partially or entirely, by any party without the
        ADDRESS ……………
        prior written consent of the other party. Any attempt to assign any of the rights,
        duties or obligations of this Memorandum of Understanding without such
        consent is void.
    </li>
    <li>
        The validity, construction and performance of this Memorandum of Understanding is governed by and shall be construed in accordance with the Laws of Federal Republic of Nigeria. The parties irrevocably agree to submit to the jurisdiction of the courts of the Federal Republic of Nigeria.
    </li>
    <li>
        No failure or delay by any party to exercise the right, power or remedy will operate as waiver of it nor will any partial exercise preclude any further exercise of the same, or some other right, power or remedy.
    </li>
</ul>

<br>

<b>IN WITNESS WHEREOF,</b> Light Blocks has caused its Common Seal to be affixed and the Investor has set his/her hand and Seal the day and year first above written.

</p>

</div>



</div>
            </div>

        </div>

    </div>

</div><!-- Sign up modal ends-->
