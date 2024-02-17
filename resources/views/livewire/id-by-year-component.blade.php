<div>
    <div class="input_field full-field">
        <label class="field-text">تاريخ تسلم الوثيقة موضوع الإجراء
        </label>
        <input id="Date_receive" name="Date_receive"  type="date" wire:model="Date_receive"  placeholder=" تاريخ تسلم الوثيقة مموضوع الاجراء" required />
    </div>
    <div class="input_field full-field select_option">
        <label class="field-text">الرقم التسلسلي    </label>
        <input type="number" name="DydocumentId" value="{{ $DydocumentId }}" readonly placeholder=" الرقم التسلسلي " required />
    </div>
    <p>{{ $tyear }}</p>
</div>
